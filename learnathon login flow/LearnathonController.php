<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Services\CustomerService;
use App\Course;
use App\Coursebadge;
use App\Lead;
use App\Parenttbl;
use App\Childrentbl;  
use App\Countrycurrency;  
use App\Services\AgentService;
use App\Helpers\LeadHelper;
use App\Faculty;

class LearnathonController extends Controller
{
    protected $foundcountry = false;

    public function __construct()
    {
        $this->getIpinfo();
    }

    public function getIpinfo()
    {
        $ip = getUserIp();
        
        try {
            $details = (object)(new \App\Services\IpInfo())->fetchIpinfo($ip);
            
            $currobj = Countrycurrency::where('country', $details->country??'IN')->first();
            
            Log::debug('ip '.$ip.' ipinfo detaills '.json_encode($details));
            if(isset($details->country))
            {
                $countryCode  = $details->country;
                $region = $details->region;
                $city = $details->city;
                $timezone = $details->timezone;
                $currency = $currobj->currency??'INR';
                $location = $details->city.','.$details->region.','.$details->country;
                $this->foundcountry = true;
            }
            else
            {
                $region = 'Unknown';
                $city = 'Unknown';
                $countryCode  = 'IN';
                $timezone = 'Asia/Kolkata';
                $currency = 'INR';
                $location = 'Undefined,Undefined,Undefined';
            }
            
        } catch (\Exception $exception) {
            Log::error($exception);

            $region = 'Unknown';
            $city = 'Unknown';
            $countryCode  = 'IN';
            $timezone = 'Asia/Kolkata';
            $currency = 'INR';
            $location = 'Undefined,Undefined,Undefined';
        }
        
        Log::debug('#ipinfodetails '.$ip.' - '.$region.' - '.$city.' - '.$countryCode.' - '.$timezone.' - '.$currency.' - '.$location);

        Session::put('ipinfo_region', $region);
        Session::put('ipinfo_city', $city);
        Session::put('ipinfo_country', $countryCode);
        
        Log::debug('Country selected for user: '.$countryCode);
        Session::put('geoplugin_countryCode', $countryCode);
        Session::put('geoplugin_timezone', $timezone);
        Session::put('geoplugin_currencyCode', $currency);
        Session::put('user_ip', $ip);
        Session::put('location', $location);
    }

    public function index()
    {
        $slug = 'learn-a-thon';
        $course = Cache::remember('acourse'.$slug, now()->addMonth(), function () use ($slug) {
            return Course::with('classes', 'faculties', 'modules', 'packages')->where('slug', $slug)->first();
        });
    
        // Get relevant courses excluding the one with the current slug
        $relevantcourses = Course::with('classes')->where('slug', '!=', $slug)->where('status', 'active')->get();
        return view('learnathon', compact('relevantcourses','course'));
    }

    public function registration()
    {
        if (Auth::guard('parent')->check()) {
            $children = \App\Childrentbl::where('parent_id', Auth::guard('parent')->user()->id)
                                    ->update(['registered_for_learnathon' => 1]);
            // Redirect to the 'events' route
            return redirect()->route('parent.events');
        }
            
        $referralcode = request()->referral_code;
        $sourceurl = $_SERVER['HTTP_REFERER']??'organic';

        setcookie('referral_code', $referralcode, time() + 24 * 3600);
        session(['source_url' => $sourceurl]);
        
        $campaign_code = $_GET['utm_campaign']??null;
        
        $utm_medium = $_GET['utm_medium']??null;
        $utm_content = $_GET['utm_content']??null;
        $utm_placement = $_GET['utm_placement']??null;
        $utm_source = $_GET['utm_source']??null;
        $fbclid = $_GET['fbclid']??null;

        if($utm_medium) {
            setcookie('utm_medium', $utm_medium, time() + (86400 * 30), "/");
        }
        if($utm_content) {
            setcookie('utm_content', $utm_content, time() + (86400 * 30), "/");
        }
        if($utm_placement) {
            setcookie('utm_placement', $utm_placement, time() + (86400 * 30), "/");
        }
        if($utm_source) {
            setcookie('utm_placement', $utm_source, time() + (86400 * 30), "/");
        }
        if($fbclid) {
            setcookie('fbclid', $fbclid, time() + (86400 * 30), "/");
        }

        Log::debug('campaign code is '.$campaign_code);

        $referredby = null;
        $referredparntid = null;
        if($referralcode)
        {
            $parent = Parenttbl::where('referral_code', $referralcode)->first();
            if($parent)
            {
                $referredby = 'parent';
                $campaign_code = 'Referred By Parent '.$parent->parent_name;
                $referredparntid = $parent->id; 
            }
            else{
                $faculty = Faculty::find(base64_decode($referralcode));
                if($faculty)
                {
                    $referredparntid = $faculty->id;
                    $referredby = 'faculty';
                    $campaign_code = 'Referred By Faculty '.$faculty->first_name.' '.$faculty->last_name;
                }
            }
        }
        setcookie("source_campaign", "", time() - 3600);
        setcookie("referred_by", "", time() - 3600);
        if ($campaign_code) {
            setcookie('source_campaign', $campaign_code, time() + (86400 * 30), "/");
            setcookie('referred_by', $referredby, time() + (86400 * 30), "/");
            setcookie('referred_id', $referredparntid, time() + (86400 * 30), "/");
        }

        $excludedCodes = ['+91', '+880', '+1', '+971', '+61', '+974', '+966', '+965', '+65'];
        $countryCodes = \App\Countrycode::whereNotIn('code', $excludedCodes)->get();

        return view('learnathon_registration', compact('countryCodes'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'parent_name' => 'required',
            'parent_email' => 'required',
            'country_code' => 'required',
            'mobile_number' => 'required',
            'wapp_country_code' => 'required',
            'wapp_number' => 'required',
            'child_name.*' => 'required|string|max:255',
            'dob.*' => 'required|date',
        ]);
        $childrenCount = count($request->child_name);

        $parent_email = request()->parent_email;
        $country_code = request()->country_code;
        $mobile_number = request()->mobile_number;
        $wapp_number = request()->wapp_number;
        $sourcePlatform = request()->utm_source;
        $sourceCampaign = request()->utm_campaign;
        $mobile = str_replace(' ', '', request()->mobile_number);
        $parent = \App\Parenttbl::where(function ($query) use ($parent_email, $mobile_number, $wapp_number) {
            $query->where('mobile_number', 'like', '%'.$mobile_number.'%')
                  ->orWhere('whatsapp_number', 'like', '%'.$wapp_number.'%')
                  ->orWhere('email', 'like', '%'.$parent_email.'%');
        })->first();
        if ($parent && $parent->id) {
            // Auth::guard('parent')->login($parent);
            // $children = \App\Childrentbl::where('parent_id', Auth::guard('parent')->user()->id)
            //     ->update(['registered_for_learnathon' => 1]);
            return response()->json([
                'success' => 'existing_account',
                'message' => 'An account already exists with these credentials.',
                'show_otp_modal' => true,
                'mobile_number' => $mobile_number,
                'country_code' => $country_code,
            ]);
        } 
        else {
            //ip, location, source_campaign, utm, country
            

            //create lead entry 
            
            $lead = Lead::where('country_code', $country_code)->where('mobile', $mobile_number)->first();

            if ($lead == null) {
                $agentService  = new AgentService();
                $lead = new Lead();
                $lead->name = request()->parent_name;
                $lead->country_code = request()->country_code;
                $lead->original_mobile = $mobile_number;
                $lead->mobile = ltrim(request()->mobile_number,0);
                $lead->email = request()->parent_email;
                $lead->student_name = $request->child_name[0]??'Child';
                $lead->dd = date('d', strtotime($request->dob[0]));
                $lead->mm = date('m', strtotime($request->dob[0]));
                $lead->yy = date('Y', strtotime($request->dob[0]));
                $lead->whatsapp_country_code = request()->wapp_country_code;
                $lead->whatsapp_number = ltrim(request()->wapp_number,0);
                $lead->save();
            
                

                $lead->landed_on = session('course')??null;
                $lead->source_campaign = $sourceCampaign;
                $lead->source_url = session('source_url_main')??session('source_url');
                $lead->source_platform = $sourcePlatform;
                
                $lead->referred_by = $_COOKIE['referred_id']??null;
                $lead->referred_type = $_COOKIE['referred_by']??null;

                $lead->utm_medium = $_COOKIE['utm_medium']??null;
                $lead->utm_content = $_COOKIE['utm_content']??null;
                $lead->utm_placement = $_COOKIE['utm_placement']??null;
                $lead->utm_source = $_COOKIE['utm_source']??null;

                $lead->last_utm_medium = $_COOKIE['utm_medium']??null;
                $lead->last_utm_content = $_COOKIE['utm_content']??null;
                $lead->last_utm_placement = $_COOKIE['utm_placement']??null;
                $lead->last_utm_source = $_COOKIE['utm_source']??null;
                $lead->fbclid = $_COOKIE['fbclid']??null;
                $lead->last_utm_campaign = $sourceCampaign;

                $lead->csr_assigned = $agentService::findRandomCSRAgentName();
                LeadHelper::retrieveCookieData($lead);
                $lead->demo_schedule_id = null;

                // $classschedule = Classschedule::with('classtbl')->find($classcheduleid);

                // $lead->last_class_name = $classschedule->classtbl->class_name??'';
                $lead->lead_comm_sent = 'No';
                $lead->lead_data_updated = 'No';
                $lead->status = 'Booked_demo';
                
                $myip = getUserIp();
                $myip = $myip == '::1' ? '0.0.0.0' : $myip;

                $location = session('location')??'undefined';

                Log::debug("inside location: ".$location);
                
                $country = \App\Countrycode::where('code', $country_code)->first();
                $defaultzone = DB::table("zones")
                                ->where('country_code', $country->iso_code)
                                ->where('default_zone','Yes');

                $zone = \App\Zone::where('country_code', $country->iso_code)
                                    ->unionAll($defaultzone)
                                    ->first();

                $timezone = $zone->zone_name??'Asia/Kolkata';
                
                if($country->iso_code == 'US' || $country->iso_code == 'CA')
                {
                    if(session('geoplugin_countryCode') == 'US' || session('geoplugin_countryCode') == 'CA')
                    {
                        $timezone = session('geoplugin_timezone');
                    }    
                }

                if(session('geoplugin_countryCode') == $country->iso_code)
                {
                    $timezone = session('geoplugin_timezone');
                }
                
                if($lead->source_campaign)
                {
                    $campaign = \App\Onlinecampaign::with('countries')->where('campaign_code', $lead->source_campaign)->where('status','Active')->first();
                    
                    if(isset($campaign))
                    {
                        $countryList = $campaign->countries->map(function($q){
                            return $q->country_code;
                        })->toArray();
                    }
                    
                    if(isset($campaign) && in_array(session('geoplugin_countryCode'), $countryList))
                    {
                        $timezone = session('geoplugin_timezone');
                    }
                }
                
                $lead->lead_ip = getUserIp();
                $lead->location = $location;
                $lead->timezone = $revisedInfo['timezone']??'Asia/Kolkata';
                $lead->update();

                $nlead = \App\Lead::find($lead->id);
                $nlead->is_premium = (new \App\Http\Controllers\Frontend\NewOnlineadsignupController)->checkPremium($lead);
                $nlead->update();
                
                (new \App\Http\Controllers\Frontend\NewOnlineadsignupController)->addVisitHistory($nlead->id);

                Log::debug('created Lead with id '.$lead->id);
            }
            else
            {
                $lead->last_utm_medium = $_COOKIE['utm_medium']??null;
                $lead->last_utm_content = $_COOKIE['utm_content']??null;
                $lead->last_utm_placement = $_COOKIE['utm_placement']??null;
                $lead->last_utm_source = $_COOKIE['utm_source']??null;
                $lead->fbclid = $_COOKIE['fbclid']??null;
                $lead->last_utm_campaign = $sourceCampaign;

                $lead->source_url = session('source_url_main')??session('source_url');
                $lead->source_platform = $sourcePlatform;
                
                $lead->email = request('email')??ltrim($mobile, 0).'@bambinos.live';
                $lead->dd = date('d', strtotime($request->dob[0]));
                $lead->mm = date('m', strtotime($request->dob[0]));
                $lead->yy = date('Y', strtotime($request->dob[0]));
                $lead->update();

                (new \App\Http\Controllers\Frontend\NewOnlineadsignupController)->addVisitHistory($lead->id);
            }
            $revisedInfo = (new \App\Http\Controllers\Frontend\NewOnlineadsignupController)->getLocationInfo(request('country_code'));

            //create parent entry
            $parent = new Parenttbl();
            $parent->parent_name = request()->parent_name;
            $parent->country = session('geoplugin_countryCode')??'IN';
            $parent->country_code = request()->country_code??'+91';
            $parent->mobile_number = ltrim(request()->mobile_number,0);
            $parent->email = request()->parent_email;
            $parent->whatsapp_country_code = request()->wapp_country_code;
            $parent->whatsapp_number = ltrim(request()->wapp_number,0);
            $parent->parent_name = request()->parent_name;
            $parent->otp = '3443';
            $parent->currency = $revisedInfo['currency']??'INR';
            $str = request()->parent_name;
            $arr = explode(' ', $str);
            $str2 = substr(ltrim(request()->mobile_number,0), 7, 10);
            $parent->referral_code = strtoupper($arr[0]).$str2.'BN';
            //$parent->currency = 'INR';
            // $parent->masterclass_counter = 20*$childrenCount;
            $parent->save();

            $request->session()->put('login_id', $parent->id);
            
            // create entry for eventpoints store parent id and points 10 points type referral only when $lead->referred_by is not null
            if($lead->referred_by) {
                $eventPoint = new \App\Eventpoint();
                $eventPoint->parent_id = $lead->referred_by;
                $eventPoint->registered_parent_id = $parent->id;
                $eventPoint->points = 10;
                $eventPoint->point_type = 'referral';
                $eventPoint->save();
            }

            //create kids entry
            foreach ($request->child_name as $index => $childName) {
                $child = new Childrentbl();
                $child->parent_id = $parent->id;
                $child->name = $childName;
                $child->dd = date('d', strtotime($request->dob[$index]));
                $child->mm = date('m', strtotime($request->dob[$index]));
                $child->yy = date('Y', strtotime($request->dob[$index]));
                $child->learnathon = 1;
                $child->registered_for_learnathon = 1;
                $child->save();
            }
            //redirect to events page
            // Auth::guard('parent')->login($parent);
            return response()->json(['success' => true]);
        }
        
        
    }

    public function schedule()
    {
        return view('learnathon_schedule');
    }

    public function existingLogin(Request $request) {
        Log::debug("Request data: ", $request->all());

        $request->validate([
            'country_code' => 'required|string',
            'mobile_no' => 'required|string',
            'password' => 'required|array|min:4',
        ]);
    
        $country_code = $request->get('country_code');
        $mobile_no = $request->get('mobile_no');
        $password = implode('', $request->get('password'));
    
        $parenttbl = Parenttbl::where('country_code', $country_code)
            ->where('mobile_number', $mobile_no)
            ->first();
        dd($parenttbl);
    
        if (!$parenttbl) {
            Log::debug("Parent not found for Country Code: {$country_code}, Mobile No: {$mobile_no}");
            return response()->json(['success' => false, 'data' => 'Account not found.']);
        }
    
        if (!Hash::check($password, $parenttbl->mpin)) {
            return response()->json(['success' => false, 'data' => 'Incorrect password']);
        }
    
        // Login logic
        $customerService = new CustomerService();
        $customerService->convertOneTimeCurrency($parenttbl);
    
        $lead = \App\Lead::where('country_code', $country_code)
            ->where('mobile', $mobile_no)
            ->first();
    
        if ($lead) {
            (new \App\Services\CustomLoginService)->parentLogin($parenttbl->id, $lead->id);
            return response()->json(['success' => true, 'data' => 'Logged in successfully']);
        }
    
        return response()->json(['success' => false, 'data' => 'Error during login.']);
    }

    public function mobileValidation(Request $request)
    {
        $mobile_no = $request->get('mobile_no');
        // dd($mobile_no);
        $country_code = $request->get('country_code');
        if (!is_numeric($mobile_no)) {
            return response()->json(['success' => false, 'data' => 'Mobile number is not valid']);
        }
        $mobile_no = ltrim($mobile_no, "0");
        $parenttbl = Parenttbl::where('country_code', $country_code)->where('mobile_number', $mobile_no)->first();
        $slug = request()->course;
        $is_workshop = 'no';
        if($slug)
        {
            $class = Classtbl::where('slug', $slug)->first();
            if($class)
            {
                $is_workshop = $class->is_workshop;
            }
            
        }
        try {
            if ($parenttbl != null) {
                $randomotp = '3443';
                $parenttbl->otp = $randomotp;
                $parenttbl->password = Hash::make($randomotp);
                $parenttbl->update();
                $request->session()->put('login_id', $parenttbl->id);
                
                $cacheKey = 'otp_sent_' . $parenttbl->country_code . '_' . $parenttbl->mobile_number;
                $lastSentTime = Cache::get($cacheKey);
                // $expireIn = null;
                // if (!$lastSentTime || now()->diffInSeconds($lastSentTime) >= 30) {
                               
                // }
                // else
                // {
                //     $expireIn = (30-now()->diffInSeconds($lastSentTime));
                // }
                dispatch(new \App\Jobs\SendOtpToParent($parenttbl, $randomotp)); 
                $expireIn = null;
                return response()->json(['success' => true, 'data' => $mobile_no, 'client_email' => $parenttbl->email, 'expiresIn' => $expireIn]);
            } 
            else 
            {
                if($is_workshop == 'no')
                {
                    return response()->json(['success' => false, 'data' => 'You are not registered with us, redirecting you to sign-up section', 'type' => 'signup' ,'workshop' => $is_workshop,'mobile_no' => $mobile_no]);
                }
                else{

                    $expireIn = null;
                    $randomotp = '3443';
                    $parenttbl =  new Parenttbl();
                    $parenttbl->country_code = $country_code;
                    $parenttbl->mobile_number = $mobile_no;
                    $parenttbl->whatsapp_number = $parenttbl->mobile_number;
                    $parenttbl->whatsapp_country_code = $parenttbl->country_code;
                    $parenttbl->otp = $randomotp;
                    $parenttbl->email = null;
                    $parenttbl->password = Hash::make($randomotp);
                    $parenttbl->currency = CustomHelper::getCurrency();
                    $parenttbl->country =  CustomHelper::getCountryFromSession();
                    $parenttbl->save();

                    $request->session()->put('login_id', $parenttbl->id);

                    // try {
                    //     if($parenttbl->country_code == '+91') {
                    //         Log::debug("Otp sent from this block1");
                    //         $smsHelper = new \App\Helpers\SMSHelper();
                    //         $sendSMS = $smsHelper->sendOTPSMSTemplate($parenttbl->mobile_number, $parenttbl->country_code, $randomotp);
                    //     }
                    // }
                    // catch(\Exception $e) {
                    //     Log::debug($e);
                    // }
                    
                    $cacheKey = 'otp_sent_' . $parenttbl->country_code . '_' . $parenttbl->mobile_number;
                    $lastSentTime = Cache::get($cacheKey);
                    
                    // if (!$lastSentTime || now()->diffInSeconds($lastSentTime) >= 30) {
                                  
                    // }
                    // else
                    // {
                    //     $expireIn = (30-now()->diffInSeconds($lastSentTime));
                    // }

                    dispatch(new \App\Jobs\SendOtpToParent($parenttbl, $randomotp));
                    $will_mail_field_show = 'N';
                    if ($parenttbl->email == null) {
                        if ($parenttbl->country_code != '+91') {
                            $will_mail_field_show = 'Y';
                        }
                    }

                    return response()->json(['success' => true, 'data' => $mobile_no, 'client_email' => $parenttbl->email,'expiresIn' => $expireIn]);
                }
            }
        } catch (\Exception $exception) {
            report($exception);
            Log::error('unable to assign zoko agent '.$exception);
        }
    }
}
