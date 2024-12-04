<section class="InnerBanner">
    <div class="mr-1 ml-lg-2 d-none d-lg-block timezone-desktop">
        <a href="javascript:void()" class="text-white" data-toggle="modal" data-target="#timeZoneModal">
            <span class="showtimezone"></span>
            <svg fill="#fff" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 10l5 5 5-5z"></path></svg>
        </a>
        <span class="livetime text-white"></span>
    </div>
    


    <div class="container-fluid">
        <div class="member-details text-center mb-5">
            
            @php
                $parentid = isset(Auth::guard('parent')->user()->id) ? Auth::guard('parent')->user()->id : session('temp_parentid');
                $parent = \App\Parenttbl::find($parentid);
                $alltotal = \App\Classschedulebooking::where('demo_class','No')->where('parent_id', $parent->id)->where('is_cancelled','No')->count();
    
                $id = base64_decode(request()->c);
                if($id) {
                    $child = \App\Childrentbl::where('id',$id)->first();
                    $total = \App\Classschedulebooking::where('child_id',$id)->where('is_cancelled','No')->where('demo_class','No')->count();
                    $remaining = \App\Classschedulebooking::leftjoin('classschedules','classschedules.id','classschedulebookings.classschedule_id')
                    ->where('child_id',$id)->where('is_cancelled','No')
                    ->whereRaw(' ((classschedules.class_date = "'.date('Y-m-d').'" and classschedules.start_time > "'.date('H:i').'") or classschedules.class_date > "'.date('Y-m-d').'")')
                    ->count();
                    $mc_remaining = \App\Classschedulebooking::leftjoin('classschedules','classschedules.id','classschedulebookings.classschedule_id')
                    ->leftjoin('classes','classschedules.class_id','classes.id')
                    ->where('child_id',$id)->where('is_cancelled','No')->where('classes.category_id','31')
                    ->whereRaw(' ((classschedules.class_date = "'.date('Y-m-d').'" and classschedules.start_time > "'.date('H:i').'") or classschedules.class_date > "'.date('Y-m-d').'")')
                    ->count();
                }
            @endphp
            <div class="member-content-details">
                <div class="timezione-block mb-2">
                    @php 
                        if($parent) {
                            $country = \App\Countrycode::where('code', $parent->country_code)->first();
                            if($country) {
                                $timezone = \App\Zone::where('country_code', $country->iso_code)->first();
                                //$timezones = \App\Zone::where('country_code', $country->iso_code)->get();
                            }
                            $lead = \App\Lead::where('mobile', $parent->mobile_number)->first();
                            $totalremaining = \App\Classschedulebooking::leftjoin('classschedules','classschedules.id','classschedulebookings.classschedule_id')
                                              ->leftjoin('classes','classschedules.class_id','classes.id')
                                              ->where('classes.category_id', '!=', '31')
                                              ->where('parent_id',$parent->id)->where('is_cancelled','No')
                    ->whereRaw(' ((classschedules.class_date = "'.date('Y-m-d').'" and classschedules.start_time > "'.date('H:i').'") or classschedules.class_date > "'.date('Y-m-d').'")')
                                              ->count();
                            $total_mc_remaining = \App\Classschedulebooking::leftjoin('classschedules','classschedules.id','classschedulebookings.classschedule_id')
                                              ->leftjoin('classes','classschedules.class_id','classes.id')
                                              ->where('parent_id',$parent->id)->where('is_cancelled','No')->where('classes.category_id','31')
                                              ->whereRaw(' ((classschedules.class_date = "'.date('Y-m-d').'" and classschedules.start_time > "'.date('H:i').'") or classschedules.class_date > "'.date('Y-m-d').'")')
                                              ->count();
                        }
                        
                        $tz = '';
                        if($lead) {
                            if($lead->timezone) {
                                $tz = $lead->timezone;
                            }
                            else {
                                if($timezone) {
                                    $tz = $timezone->zone_name;
                                }
                            }
                        }
                        if($tz == '') {
                            $tz = 'Asia/Kolkata';
                        }
                        $timezones = \App\Zone::get();
                    @endphp
                    <!-- <select class="timezone">
                        <option val="Asia/Kolkata">Asia/Kolkata</option>
                        @foreach($timezones as $timezone) 
                            <option val="{{$timezone->zone_name}}" @if($tz == $timezone->zone_name) selected @endif>{{$timezone->zone_name}}</option>
                        @endforeach
                    </select> -->
                    <input type="hidden" id="defaulttimezone" value="{{$tz}}">
                    <input type="hidden" id="selectedtimezone" value="">
                    <a href="javascript:void()" class="text-white d-lg-none" data-toggle="modal" data-target="#timeZoneModal">
                        <span class="showtimezone"></span>
                        <svg fill="#fff" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 10l5 5 5-5z"></path></svg>
                    </a>
                    <span class="livetime text-white d-lg-none"></span>
                </div>
                <h1>Welcome, {{ $parent->parent_name??'' }}</h1>

                
                <div class="row">
                    @if(Auth::guard('parent')->user())
                        @php
                            // Get the authenticated parent
                            $parent = Auth::guard('parent')->user();
                            
                            // Calculate the total points for all children of this parent
                            $totalPointsThisWeek = $parent->children->sum('total_points_this_week');
                        @endphp
                        <div class="col-3">
                            <h5>Total Weekly Points</h5>
                            <label>{{ $totalPointsThisWeek }}</label>
                        </div>
                    @endif

                    <div class="col-3">
                        <h5>Balance</h5>
                        <label>{{ CustomHelper::getCurrencySymbolOfCurrency($parent->currency) }}{{number_format($parent->available_points, 2)}}</label>
                    </div>
                    
                    <div class="col-3">
                        <h5>Regular Classes Left</h5>
                        <label>@if($id) {{$remaining}} @else @if($totalremaining) {{$totalremaining}} @else 0 @endif @endif</label>
                    </div>
                    
                    <div class="col-3">
                        <h5>Master Classes left</h5>
                        <label>@if($parent) {{$parent->masterclass_counter??0}}  @endif</label>
                    </div>
                </div>
                <div class="profile-button text-center d-flex flex-column align-items-center">
                    <button type="button" class="btn btn-sm btn-round btn-light" data-toggle="modal" data-target="#profileModal">
                        <i class="fa fa-pencil mr-2"></i>Edit Profile
                    </button>
                    
                    @if(Auth::guard('parent')->user())
                        @php
                            // Get the authenticated parent
                            $parent = Auth::guard('parent')->user();
                            
                            // Calculate the total points for all children of this parent
                            $totalPointsThisWeek = $parent->children->sum('total_points_this_week');
                        @endphp

                        <!-- Total Points Badge -->
                        <div style="margin-top: 10px; position: relative;">
                            <span class="badge badge-primary" 
                                style="color: #000000; cursor: default; font-size: 16px; padding: 10px 20px; background-color: #fde054; border-radius: 20px; border: none; width: 155px; display: inline-block;">
                                {{ $totalPointsThisWeek }} Coins <i class="fa fa-coins" style="color: #3777ff; font-size: 20px; margin-left: 10px;"></i>
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="team-page-nav">
        <div class="container text-center">
            <div class="overflow-x">
                <ul class="scroll-grid">
                    <li>
                        <div class="checkout-address select-member text-center">
                            <input type="radio" class="childSpecific" name="member" @if(!isset(request()->c)) checked="checked" @endif data-childid="">
                            <div class="widget-posts-descr">
                                <div class="date-content">
                                    <h3>All</h3>
                                    <h4>--</h4>
                                </div>
                            </div>
                        </div>
                    </li>
                    @foreach($parent->children as $key => $child)
                    <li>
                        <div class="checkout-address select-member text-center">
                            <input type="radio" name="member" @if(base64_decode(request()->c) == $child->id) checked="checked" @endif class="childSpecific" data-childid="{{$child->id}}">
                            <div class="widget-posts-descr">
                                <div class="date-content">
                                    <h3>{{$child->name}}</h3>
                                    <h4>{{date('Y')-($child->yy)}} Years</h4>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="profileModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-radius">
            <form action="{{route('parent.update.profile')}}" id="updateProfile" method="POST" data-ignore="">
                <div class="modal-body p-4 p-sm-5">
                     <div class="mb-4">
                        <h4>My Profile</h4>
                    </div>
                    <button type="button" class="_close_popup_buton" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $parent->parent_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" value="{{$parent->mobile_number}}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" value="{{ $parent->email }}">
                    </div>
                    <button type="submit" class="btn btn-round btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="memberModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-radius">
            <form action="#" method="POST">
                <div class="modal-body p-4">
                     <div class="mb-4">
                        <h4>My Childs</h4>
                    </div>
                    
                    <button type="button" class="_close_popup_buton" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    
                    @php
                        $childs = ExtraHelper::getChilds();
                    @endphp
                    <div class="row mb-4">
                        @foreach ($childs as $child)
                        <div class="col-6">
                            <div class="checkout-address select-member text-center">
                                <input type="radio" name="member" value="" class="" checked="checked">
                                <div class="widget-posts-descr">
                                    <div class="date-content">
                                        <div class="member-name">
                                            <img src="{!! asset('images/faculty_document/1584714415.png') !!}" alt="profile_image">
                                        </div>
                                        <h3>{{$child->name}}</h3>
                                        <h4>{{(date('Y')-$child->yy)}} Years</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-link p-0" data-dismiss="modal" data-toggle="modal" data-target="#addchild"><i class="fa fa-plus mr-2"></i>Add Member</button>



                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="timeZoneModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-radius">
            <div class="modal-header d-block">
                <div class="text-center">
                    <h5>Change Timezone</h5>
                    <small>Your current timezone is {{$tz}}</small>   
                </div>
            </div>
            <div class="modal-body p-0">
                <ul class="timezoneList">
                    @foreach ($timezones as $zone)
                        <li class="tzone @if($zone->zone_name == $tz) active activetzone @endif" data-timezone="{{$zone->zone_name}}"><img style="width:18px;" src="{{ asset('countryflags/'.strtolower($zone->country_code).'.png') }}"/> ({{$zone->zone_name}}) - {{$zone->country_name}} Time</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-round" data-dismiss="modal">Cancel</button> 
                <button type="button" class="btn btn-warning btn-round updatetimezone">Update</button> 
            </div>
        </div>

    </div>
</div>
