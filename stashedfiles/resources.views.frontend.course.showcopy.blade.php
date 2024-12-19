@extends('layouts.frontend')

@section('css')

<title>{{ $course->meta_title }}</title>
<meta name="title" content="{{ $course->meta_title }}">
<meta name="description" content="{!! $course->meta_description !!}">

<!-- Twitter Card-->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@BambinosLive">
<meta name="twitter:title" content="{{ $course->meta_title }}">
<meta name="twitter:description" content="{!! $course->meta_description !!}">
<meta name="twitter:image" content="{{ asset($course->image) }}">
<!-- open graph -->
<meta property="og:locale" content="en_US">
<meta property="og:type" content="Website">
<meta property="og:title" content="{{ $course->meta_title }}">
<meta property="og:description" content="{!! $course->meta_description !!}">
<meta property="og:image" content="{{ asset($course->image) }}">
<meta property="og:url" content="{{ request()->fullUrl() }}">

<link rel="canonical" href="{{ request()->fullUrl() }}">

<link rel="stylesheet" href="{!! asset('public/assets/booking1/css/gita.css?v=2.5') !!}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@include('includes.frontend1.css')
@include('includes.signupnew1.css')

<style>
    html {
        scroll-behavior: smooth;
    }

    .course-hero-banner-wrapper {
        min-height: 80vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px 20px;
    }

    .course-hero-banner-content {
        width: 60%;
        padding-right: 40px;
    }

    .course-hero-image-wrapper {
        width: 40%;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }

    .hero-heading {
        font-size: 3rem;
        font-weight: bold;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        margin-bottom: 20px;
    }

    .hero-subheading {
        font-size: 1.5rem;
        color: #fde054;
        font-weight: 500;
        margin-bottom: 40px;
    }

    .badge-popular {
        background-color: #37d3ff;
        color: #fff;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .form-container {
        width: 100%;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        padding-top: 20px;
    }

    .styled-form {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        border: 3px solid #fded99;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
        width: 100%;
        padding: 30px 20px;
        margin-top: 20px;
    }

    .styled-form:hover {
        transform: scale(1.05);
    }

    .scrollable-container {
        width: 100%;
        max-width: 100vw;
        overflow-x: auto;
        white-space: nowrap;
        padding: 10px 0;
        margin: 0;
    }

    .scrollable-container .row {
        display: inline-flex;
        flex-wrap: nowrap;
        width: max-content;
    }

    .col-md-3.col-lg-2 {
        flex: 0 0 auto;
        max-width: 220px;
        min-width: 220px;
        height: 100%;
        box-sizing: border-box;
    }

    .checkout-address {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: auto;
        padding: 15px;
        box-sizing: border-box;
        text-align: center;
    }

    .widget-posts-descr {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .date-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%; 
    }

    .date-content img {
        filter: none;
        opacity: 1;
        border: none;
    }

    .scrollable-container::-webkit-scrollbar {
        height: 8px;
    }

    .scrollable-container::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 10px;
    }

    .scrollable-container {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .scrollable-container::-webkit-scrollbar {
        display: none;
    }

    @media (max-width: 768px) {
        .scrollable-container {
        width: 100%;
        max-width: 100vw;
        overflow-x: auto;
        white-space: nowrap;
        padding: 10px 0; /* Top and bottom padding */
        padding-left: 38px; /* Add padding to the left */
        margin: 0;
    }

    .scrollable-container .row {
        display: inline-flex;
        flex-wrap: nowrap;
        width: max-content;
    }

    .scrollable-container::-webkit-scrollbar {
        display: none;
    }

    .col-md-3, .col-lg-2 {
        flex: 0 0 auto;
        width: 180px;
        min-width: 180px;
        margin: 0 5px;
        scroll-snap-align: start;
    }

    .checkout-address {
        padding: 10px; /* Ensure padding inside boxes */
        box-sizing: border-box;
        text-align: center;
    }
        .course-hero-banner-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .course-hero-banner-content {
            width: 100%;
            margin-left: 4vw;
            margin-top: 0px;
            padding-top: 0px;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .course-hero-image-wrapper {
            width: 100%;
            margin-left: 1vw;
            margin-top: 0px;
            padding-top: 0px;
            margin-bottom: 4vh;
        }

        .styled-form {
            width: 100%;
            padding: 20px 15px;
            max-width: 400px;
        }

        h1, .tagline { 
            margin: 10px 0;
        }
    }

</style>

@endsection

@section('content')

@include('includes.frontend1.header', ['course_slug' => $slug])

<section id="hero-banner" class="course-hero-banner" style="background: bottom/100% 0 no-repeat url({{ asset('public/assets/frontend1/images/bg-bottom.png') }}),0/cover no-repeat url({{ asset('public/assets/frontend1/images/course-image-bg.png') }}); min-height: 90vh;">
    <div class="course-hero-banner-wrapper">
        <div class="course-hero-banner-content">
            <div class="clp-lead__element-item bestSeller">
                <span class="badge badge-warning">{{$course->tag}}</span>
            </div>
            <h1 style="color: #FFFFFF;">{!! $course->name !!}</h1>
        </div>
        <div class="course-hero-image-wrapper">
            <div class="course-hero-image-mask form-container">
            <!-- <img class="img-fluid rounded-lg lazy" src="{!! asset('public/assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset($course->image) !!}" alt="{!! $course->name !!}"> -->
                <form action="{{ route('newdemobooking.send.otp') }}" method="POST" id="sendotp" class="styled-form">
                    @csrf
                    @include('newadsignup._partials.signupform')
                </form>
            </div>
        </div>
    </div>
</section>


<section class="course-card-sec">
    <div class="top-wave">
        <div></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-11">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>{!! $course->short_description??'' !!}</h4>

                                <div class="clp-lead__element-row mb-4">

                                    <?php $classrating = CustomHelper::getCourseTotalRating($course->classes); ?>
                                    <?php $avgrating = CustomHelper::CourseAvgRating($course->classes);
                                    $roundval = round($avgrating);
                                    $avgrating = number_format((float)$avgrating, 1, '.', '');  ?>
                                    <?php $student_enrolled = CustomHelper::getTotalCourseEnrollment($course->classes); ?>

                                    @if($roundval>0)
                                    <div class="clp-lead__element-item ">
                                        <div class="rate-count">
                                            <span>
                                                @for($z=1;$z<=$avgrating;$z++) <i class="fa fa-star"></i>
                                                    @endfor
                                                    <?php $offstar = 5 - ($avgrating);  ?>
                                                    @for($z=$offstar;$z>0;$z--)
                                                    <i class="fa fa-star-half-o"></i>
                                                    @endfor
                                                    <b>{!! $avgrating !!}/5</b>
                                            </span>
                                        </div>
                                    </div>
                                    @endif

                                    @if($student_enrolled>0)
                                    <div class="clp-lead__element-item enroll-count">
                                        {!! $student_enrolled !!} <small>Enrollments</small>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="booking_contact">
                                    <div class="courseInclude">
                                        <div class="icon_image">
                                            Age Group:
                                        </div>
                                        <div class="icon_text">
                                            @php
                                            $sortedClasses = $course->classes->sortBy('min_age');
                                            @endphp
                                            @foreach($sortedClasses as $class)
                                            <label class="badge badge-dark">{{ $class->min_age.' - '.$class->max_age.' Years' }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="courseInclude">
                                        <div class="icon_image">
                                            Batch Size:
                                        </div>
                                        @if($slug == 'phonics')
                                        <div class="icon_text"><label class="badge badge-dark">1:1 (25 Min)</label><label class="badge badge-dark ml-1">1:1 (45 Min)</label></div>
                                        @else
                                        <div class="icon_text"><label class="badge badge-dark">1:1</label><label class="badge badge-dark ml-1">1:{{$course->batch_size}}</label></div>
                                        @endif
                                    </div>
                                </div>

                                <div class="">
                                    @if(Auth::guard('parent')->user())
                                    <button type="button" class="btn btn-round btn-primary mr-5 mt-4" onclick="invite()">
                                        <i class="fa fa-share-alt mr-2"></i>Invite &amp; Earn
                                    </button>
                                    <button type="button" class="btn btn-round btn-warning open_book_demo mr-5 mt-4 ml-5 pl-5">Book A Free Demo</button>
                                    @else
                                    <button type="button" class="btn btn-round btn-warning open_book_demo mt-4 ml-5 pl-5">Book A Free Demo</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-course-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="section-title text-center mb-4">
                    <h2>About the Program</h2>
                </div>
                <h4 class="mb-5 text-center">Our Unique Curriculum is Immersive, Engaging, and Captures the Imagination of Children.</h4>
            </div>
        </div>
    </div>
    <div class="about-course-tab pt-4">
        <div class="white-shape">
            <div></div>
        </div>
        <div class="container">

            <div class="tab-agegroup text-center mt-4">
                <div class="row justify-content-center mt-4 mb-5">
                    <div class="scrollable-container">
                        <div class="row justify-content-center mt-4 mb-5">
                            @php
                            $sortedClasses = $course->classes->sortBy('min_age');
                            @endphp
                            @foreach($sortedClasses as $key => $class)
                            <div class="col-md-3 col-lg-2">
                                <div class="checkout-address">
                                    <input type="radio" class="dateselect module" name="module" data-classid="{{$class->id}}" data-classdate="2021_09_06" @if($key==0) checked="checked" @endif>
                                    <div class="widget-posts-descr">
                                        <div class="date-content">
                                            @php
                                            $agegroupimage = \App\Coursemodule::where('class_id', $class->id)->pluck('agegroupimage')[0]??'public/assets/frontend1/images/4-5yeargroup.png';
                                            $grade = \App\Coursemodule::where('class_id', $class->id)->value('title')??($class->min_age.' - '.$class->max_age);
                                            @endphp
                                            <img class="img-fluid" src="{{ asset('public/assets/frontend1/images/4-5yeargroup.png') }}" data-id="{{$class->id}}">
                                                @if($slug != 'alpha-math')
                                                    <h3>{{ $class->min_age.' - '.$class->max_age }} Years</h3>
                                                @else
                                                    <h3>{{ $grade }}</h3>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Static Inputs for Additional Grades -->
                <div class="col-md-3 col-lg-2">
                    <div class="checkout-address">
                        <input type="radio" class="dateselect module" name="module" disabled>
                        <div class="widget-posts-descr">
                            <div class="date-content">
                                <img class="img-fluid" src="{{ asset('public/assets/frontend1/images/4-5yeargroup.png') }}">
                                <h3>Grade 6</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-2">
                    <div class="checkout-address">
                        <input type="radio" class="dateselect module" name="module" disabled>
                        <div class="widget-posts-descr">
                            <div class="date-content">
                                <img class="img-fluid" src="{{ asset('public/assets/frontend1/images/6-8yeargroup.png') }}">
                                <h3>Grade 7</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-2">
                    <div class="checkout-address">
                        <input type="radio" class="dateselect module" name="module" disabled>
                        <div class="widget-posts-descr">
                            <div class="date-content">
                                <img class="img-fluid" src="{{ asset('public/assets/frontend1/images/grade-static.png') }}">
                                <h3>Grade 8</h3>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-course-tab-block">
                @foreach($course->classes as $key => $class)
                <div class="module{{$class->id}} modules" @if($key> 0) style="display:none;" @endif>
                    <div class="row">
                        @php $modules = $course->get_module($class->id)??[];
                        @endphp
                        @foreach($modules as $module)
                        <div class="col-12 col-md-12 col-lg-9 mb-4">
                            <div class="section-title mb-3">
                                <h2 class="text-body">{{$module->title}}</h2>
                            </div>
                            <p>{{$module->description}}</p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="mb-3">{{$module->curriculum_title}}</h5>
                            <div class="design-list">
                                {!! $module->curriculum_description !!}
                            </div>
                            <a class="btn btn-outline-primary btn-round mt-3" href="{!! asset($class->get_brochure($course->id)) !!}" target="_blank" download="">
                                <i class="fa fa-cloud-download mr-2"></i>Download Brochure
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="oval-figure-bg mt-5 mt-lg-2"><img class="img-fluid" alt="image" src="{{asset($module->moduleimage)}}"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<nav class="scroll-nav">
    <div class="container">
        <ul class="scroll-nav-menu">
            {{--<li><a class="active" href="#_Video">Videos</a></li>--}}
            <li><a href="#_Reviews"><span class="d-none d-sm-inline-block">Course</span> Reviews({{$classrating}})</a></li>
            <li><a href="#_Instructors">Instructors</a></li>
            <li><a href="#_Packages"><span class="d-none d-sm-inline-block">Course</span> Packages</a></li>
            <li><a href="#_FAQs">FAQs</a></li>
        </ul>
        <div>
</nav>


<section class="review-section" id="_Reviews">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2>Real Feedback from Real Parents Live Everyday</h2>
        </div>
        <h4 class="mb-4 text-center">We Believe In 100% Transparency, So You Can Trust Us For Your Child Development</h4>
        <div class="text-center mb-5">
            @if(Auth::guard('parent')->user())
            <button type="button" class="btn btn-round btn-warning open_book_demo">Book A Free Demo</button>
            @else
            <button type="button" class="btn btn-round btn-warning open_book_demo">Book A Free Demo</button>
            @endif
        </div>
        @if($avgrating>0)
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="review-block">
                    <div class="review-sum text-center">
                        @if($roundval>0)
                        <h3>{!! $avgrating !!}</h3>
                        <h4>Course Rating</h4>
                        <div class="rating">
                            @if($roundval>0)
                            @for($i=0;$i<$roundval;$i++) <svg viewBox="0 0 24 24">
                                <path d="M12 17.27l6.18 3.73-1.64-7.030 5.46-4.73-7.19-0.61-2.81-6.63-2.81 6.63-7.19 0.61 5.46 4.73-1.64 7.030 6.18-3.73z"></path></svg>
                                @endfor
                                @endif
                        </div>
                        <p class="text-light">{!! $avgrating !!} average based on {!! $classrating !!} ratings.</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-lg-4 order-md-2">
                            <div class="review-part mb-4">

                                @php $stars = CustomHelper::starrate_for_course($course->classes); @endphp
                                <div class="review-strip order-sm-1">
                                    <p class="styled">
                                        <label class="title">5 Star</label>
                                        <progress value="{!! $stars->fivestar  !!}" max="100"></progress>
                                        <label class="value">{!! $stars->fivestar !!}%</label>
                                    </p>
                                    <p class="styled">
                                        <label class="title">4 Star</label>
                                        <progress value="{!! $stars->fourstar  !!}" max="100"></progress>
                                        <label class="value">{!! $stars->fourstar !!}%</label>
                                    </p>
                                    <p class="styled">
                                        <label class="title">3 Star</label>
                                        <progress value="{!! $stars->threestar !!}" max="100"></progress>
                                        <label class="value">{!! $stars->threestar !!}%</label>
                                    </p>
                                    <p class="styled">
                                        <label class="title">2 Star</label>
                                        <progress value="{!! $stars->twostar  !!}" max="100"></progress>
                                        <label class="value">{!! $stars->twostar !!}%</label>
                                    </p>
                                    <p class="styled">
                                        <label class="title">1 Star</label>
                                        <progress value="{!! $stars->onestar  !!}" max="100"></progress>
                                        <label class="value">{!! $stars->onestar !!}%</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8">
                            @if($classfeedbacks->count())
                            <div class="_maxComment">
                                <div class="comment">
                                    @foreach($classfeedbacks as $classschedulefeedback)
                                    @if($classschedulefeedback->parenttbl != null && $classschedulefeedback->rating >= 3)
                                    <div class="card-comment">
                                        <div class="avatarRow">
                                            <div class="avatar">
                                                <span class="avatar-initial">{!! substr($classschedulefeedback->parenttbl->parent_name,0,1) !!}</span>
                                            </div>
                                            <div class="avatarRight">
                                                <h4>
                                                    {!! $classschedulefeedback->parenttbl->parent_name !!}
                                                </h4>
                                                @if($classschedulefeedback->rating != null)
                                                <div class="rating">
                                                    @if($classschedulefeedback->rating>0)
                                                    @for($i=1;$i<=$classschedulefeedback->rating;$i++)
                                                        <svg viewBox="0 0 24 24">
                                                            <path d="M12 17.27l6.18 3.73-1.64-7.030 5.46-4.73-7.19-0.61-2.81-6.63-2.81 6.63-7.19 0.61 5.46 4.73-1.64 7.030 6.18-3.73z"></path>
                                                        </svg>
                                                        @endfor
                                                        @endif
                                                </div>
                                                @endif
                                                <label>{!! CustomHelper::getClassDateSessionTZ('d F Y',($classschedulefeedback->schedule)) !!}</label>
                                            </div>
                                        </div>
                                        @if($classschedulefeedback->other != null)
                                        <div class="comment-text">
                                            <p>{!! $classschedulefeedback->other !!}</p>
                                        </div>
                                        @endif

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- <a href="{{route('frontend.course.reviews', $course->slug)}}" target="_blank" class="btn btn-sm btn-outline-primary btn-round">Show More</a> -->
                            <a href="#hero-banner" class="btn btn-sm btn-outline-primary btn-round">Show More</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<section class="course-faculty-sec" id="_Instructors">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10 mx-auto text-center my-4">
                <div class="section-title text-center mb-4">
                    <h2>Meet our awesome teachers!</h2>
                </div>
                <h4 class="mb-4">Our team of dedicated, certified, and passionate teachers are the heart of bambinos.live</h4>
                @if(Auth::guard('parent')->user())
                <!-- <button type="button" class="btn btn-warning btn-round btn-large mt-0 mb-4" data-toggle=
                            "modal" data-target="#demoModal"> Book A Free Demo </button> -->
                <button type="button" class="btn btn-round btn-warning open_book_demo mt-0 mb-4">Book A Free Demo</button>
                @else
                <button type="button" class="btn btn-round btn-warning open_book_demo mt-0 mb-4">Book A Free Demo</button>
                @endif
            </div>
        </div>
        <div class="faculty__carousel_area">
            <div class="owl-carousel owl-theme" id="educators-carousel">
                @php
                $coursefaculties = Cache::remember('coursefaculties'.$course->id, (60*24), function() use($course){
                return $course->faculties;
                });
                @endphp
                @foreach($coursefaculties as $faculty)
                <div class="faculty_container">
                    <div class="faculty_image_area">
                        @if($faculty->photo != null)
                        <img class="lazy" src="{!! asset('public/assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('public/images/faculty/'.$faculty->photo) !!}" alt="faculty image">
                        @else
                        <img class="lazy" src="{!! asset('public/assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('public/assets/parent/images/filter-left.jpg') !!}" alt="faculty image">
                        @endif
                        <div class="faculty_caption">
                            <div class="faculty_name">
                                <h5>{!! $faculty->first_name !!} {!! $faculty->last_name !!}</h5>
                            </div>
                            <?php $stat = CustomHelper::getfacultystats($faculty->id);
                            $avg = $stat->rating_l30d_rating ?? '4.6';
                            $avg = max($avg, '4.6');
                            ?>
                            @if($avg>0)
                            <div class="_ficonPart mt-2">
                                <div class="icon_image">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M12 17.27l6.18 3.73-1.64-7.030 5.46-4.73-7.19-0.61-2.81-6.63-2.81 6.63-7.19 0.61 5.46 4.73-1.64 7.030 6.18-3.73z"></path>
                                    </svg>
                                </div>
                                <div class="icon_text">{!! number_format((float)$avg, 1, '.', '') !!} Instructor Rating</div>
                            </div>
                            @endif
                            <?php $students = CustomHelper::get_faculty_rating($faculty->id); ?>
                            <div class="faculty_text">
                                @if($faculty->bio != null)
                                @if(strlen($faculty->bio) > 68)
                                {!! substr($faculty->bio, 0, 68) !!}
                                <button type="button" class="btn btn-link p-0 openfacultymodal" data-action="{{ route('frontend.coursefaculty.show', $faculty->id) }}">..Read More</button>
                                @else
                                {!! $faculty->bio !!}
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="faculty-dark-bg">
                        <div class="mb-2 faculty-lang">Speaks:
                            <strong>
                                @foreach($faculty->languages as $key => $language)
                                {{$language->language}}
                                @if($key < count($faculty->languages) - 1)
                                    {{ ',' }}
                                    @endif
                                    @endforeach
                            </strong>
                        </div>
                        <div class="d-sm-flex">
                            @if(isset($faculty->teaching_experience))
                            <label class="badge badge-warning badge-demo mr-3">Experience: {{$faculty->teaching_experience}}</label>
                            @endif
                            <div class="_ficonPart">
                                <div class="icon_image">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <div class="icon_text">{{classCount($faculty->id)}}+ Classes</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="course-package" id="_Packages">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2>Choose a pack and begin an amazing journey</h2>
        </div>
        <div class="tab-menu mb-3">
            <ul class="nav nav-tabs">
                @if($slug == 'phonics')
                <li>
                    <a class="left active" href="#tab1" role="tab" data-toggle="tab">1:1 Class<small class="d-block">(25 Min)</small></a>
                </li>
                <li>
                    <a class="right" href="#tab2" role="tab" data-toggle="tab">1:1 Class<small class="d-block">(45 Min)</small></a>
                </li>
                @else
                <li>
                    <a class="left active" href="#tab1" role="tab" data-toggle="tab">1:{{$course->batch_size}} Class<small class="d-block">(Group)</small></a>
                </li>
                <li>
                    <a class="right" href="#tab2" role="tab" data-toggle="tab">1:1 Class<small class="d-block">(Private)</small></a>
                </li>
                @endif
            </ul>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9 col-xl-6">
                <div class="tab-content">
                
                    <div class="tab-pane fade show active" id="tab1">
                        @foreach($course->classes as $key => $class)
                        <div class="mobile-course-package allpackage package{{$class->id}} @if($key > 0) d-none @endif">
                            @foreach($packagetypes as $key => $pkgtype)
                            @php $package = $course->get_package($class->id, '1:4 Package', $pkgtype, $slug) @endphp
                            @if($package)
                            @if($package->package_type == 'Basic')
                            @else
                            <div class="checkout-address">
                                <input type="checkbox" class="" name="package{{$class->id}}">
                                <div class="widget-posts-descr">
                                    <div class="_fakeRadio"></div>
                                    <div class="radioContent">
                                        <div class="left">
                                            <h5>
                                                @if($package->package_type == 'Basic') Learner @endif
                                                @if($package->package_type == 'Master') Achiever @endif
                                                @if($package->package_type == 'Advanced') Leader @endif
                                            </h5>
                                            <label class="badge badge-warning">{{ $package->sessions }} Sessions</label>
                                        </div>

                                        <div class="right">
                                            {!! CustomHelper::coursePricing($package, true) !!}
                                            @php
                                            $discount = round((($package->mrp-$package->sale_price)/$package->mrp)*100);
                                            @endphp
                                            @if($discount > 0)
                                            <label class="curriculam-discount">{!! $discount !!}% Off</label>
                                            @endif
                                            <button type="button" class="btn btn-light"><i class="fa fa-angle-down"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="curriculam-list">
                                            <h6>What will your child learn?</h6>
                                            {!! $package->learn !!}
                                        </div>
                                        @if($class->get_brochure($course->id))
                                        <a class="d-block mb-3 mt-4 text-center" href="{!! asset($class->get_brochure($course->id)) !!}" target="_blank" download>
                                            <i class="fa fa-cloud-download mr-2"></i>Download Brochure
                                        </a>
                                        @endif
                                        @if(Auth::guard('parent')->user())
                                        <button type="button" class="btn btn-warning btn-block showpaidbookingmodal" data-packagetype="{{ $package->package_type }}" data-minage="{{ $class->min_age }}" data-maxage="{{ $class->max_age }}" data-sessions="{{$package->sessions}}" data-courseid="{{$course->id}}" data-pkgid="{{$package->id}}" data-perclassprice="{{ CustomHelper::getCurrencySymbol() }} {{ number_format(CustomHelper::getPricing((($package->sale_price)), (($package->international_sale_price)), 'USD')) }}">Book Now</button>
                                        @else
                                        <button type="button" class="btn btn-warning btn-block open_popup_button_header">Book Now</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @endforeach
                        </div>
                        @endforeach
                        <!-- ================== ENDING MOBILE VIEW ==================== -->
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        {{-- <div class="tab-agegroup text-center">
                                <h5>Choose your child age</h5>
                                <div class="row justify-content-center mt-3 mb-4">
                                    @foreach($course->classes as $key => $class)
                                        <div class="col-md-3 col-lg-2">
                                            <div class="checkout-address">
                                                <input type="radio" name="1-1package" class="package" data-classid="{{ $class->id }}" @if($key == 0) checked="checked" @endif>
                        <div class="widget-posts-descr">
                            <div class="date-content">
                                <h3>{{ $class->min_age.' - '.$class->max_age }} Years</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> --}}


        {{-- @foreach($course->classes as $key => $class)
                            <div class="curriculam-overflow">
                                <div class="curriculam-row allpackage package{{$class->id}} @if($key > 0) d-none @endif">
        @foreach($packagetypes as $key => $pkgtype)
        @php $package = $course->get_package($class->id, '1:1 Package', $pkgtype, $slug) @endphp
        @if($package)
        <div class="curriculam-div">
            <div class="curriculam-card">
                <div class="curriculam-header">
                    <h3>
                        @if($package->package_type == 'Basic') Learner @endif
                        @if($package->package_type == 'Master') Achiever @endif
                        @if($package->package_type == 'Advanced') Leader @endif</h3>
                    <div class="bg-session d-flex align-items-center justify-content-center">
                        <p class="mb-0">{{ $package->sessions }} Sessions</p>
                    </div>
                </div>
                <div class="curriculam-body">

                    @if(session('geoplugin_country') == 'IN')
                    <label class="curriculam-discount"><span>{!! round((($package->mrp-$package->sale_price)/$package->mrp)*100) !!}%</span>Off</label>
                    @else
                    <label class="curriculam-discount"><span>{!! round((($package->international_mrp-$package->international_sale_price)/$package->international_mrp)*100) !!}%</span>Off</label>
                    @endif

                    <div class="curriculam-list">
                        <h6>What will your child learn?</h6>
                        {!! $package->learn !!}
                    </div>

                    <!-- 1:1 PRICING -->
                    {!! CustomHelper::coursePricing($package) !!}


                </div>
                @if(Auth::guard('parent')->user())
                <button type="button" class="btn btn-warning btn-block showpaidbookingmodal" data-packagetype="{{ $package->package_type }}" data-minage="{{ $class->min_age }}" data-maxage="{{ $class->max_age }}" data-sessions="{{$package->sessions}}" data-courseid="{{$course->id}}" data-pkgid="{{$package->id}}" data-perclassprice="{{ CustomHelper::getCurrencySymbol() }} {{ CustomHelper::getPackageIntlPricing($package->sale_price) }}">Book Now</button>
                @else
                <button type="button" class="btn btn-warning btn-block open_popup_button_header">Book Now</button>
                @endif
            </div>
            @if($class->get_brochure($course->id))
            <a class="d-block mt-3 text-center" href="{!! asset($class->get_brochure($course->id)) !!}" target="_blank" download>
                <i class="fa fa-cloud-download mr-2"></i>Download Brochure
            </a>
            @endif
        </div>
        @endif
        @endforeach
    </div>
    </div>
    @endforeach --}}

    @foreach($course->classes as $key => $class)
    <div class="mobile-course-package allpackage package{{$class->id}} @if($key > 0) d-none @endif">
        @foreach($packagetypes as $key => $pkgtype)
        @php $package = $course->get_package($class->id, '1:1 Package', $pkgtype, $slug) @endphp
        @if($package)
        @if($package->package_type == 'Basic')
        @else
        <div class="checkout-address">
            <input type="checkbox" class="" name="package{{$class->id}}">
            <div class="widget-posts-descr">
                <div class="_fakeRadio"></div>
                <div class="radioContent">
                    <div class="left">
                        <h5>
                            @if($package->package_type == 'Basic') Learner @endif
                            @if($package->package_type == 'Master') Achiever @endif
                            @if($package->package_type == 'Advanced') Leader @endif
                        </h5>
                        <label class="badge badge-warning">{{ $package->sessions }} Sessions</label>
                    </div>

                    <div class="right">
                        @if(session('geoplugin_countryCode') == 'IN')
                        <h5 class="{{session('geoplugin_countryCode')}}pricetest">
                            <span>{!! CustomHelper::getCurrencySymbol() !!} {{ number_format(CustomHelper::getPricing( (($package->sale_price)*$package->sessions), (($package->international_sale_price)*$package->sessions), 'USD')) }}</span>
                            <small><del>{{ (CustomHelper::getPackageIntlPricing($package->mrp)*$package->sessions)+200 }}</del></small>
                        </h5>
                        @else
                        <h5 class="{{ CustomHelper::getCountryFromSession().' '.CustomHelper::getCurrency()}}pricetest1">
                            <span>{!! CustomHelper::getCurrencySymbol() !!} {{ number_format(CustomHelper::getPricing( (($package->sale_price)*$package->sessions), (($package->international_sale_price)*$package->sessions), 'USD')) }}</span>
                            <small><del>{{ (CustomHelper::getPackageIntlPricing($package->mrp)*$package->sessions)+200 }}</del></small>
                        </h5>
                        @endif
                        <label class="curriculam-discount">{!! round((($package->mrp-$package->sale_price)/$package->mrp)*100) !!}% Off</label>
                        <button type="button" class="btn btn-light"><i class="fa fa-angle-down"></i></button>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="curriculam-list">
                        <h6>What will your child learn?</h6>
                        {!! $package->learn !!}
                    </div>
                    @if($class->get_brochure($course->id))
                    <a class="d-block mb-3 mt-4 text-center" href="{!! asset($class->get_brochure($course->id)) !!}" target="_blank" download>
                        <i class="fa fa-cloud-download mr-2"></i>Download Brochure
                    </a>
                    @endif
                    @if(Auth::guard('parent')->user())
                    <button type="button" class="btn btn-warning btn-block showpaidbookingmodal" data-packagetype="{{ $package->package_type }}" data-minage="{{ $class->min_age }}" data-maxage="{{ $class->max_age }}" data-sessions="{{$package->sessions}}" data-courseid="{{$course->id}}" data-pkgid="{{$package->id}}" data-perclassprice="{{ CustomHelper::getCurrencySymbol() }} {{ CustomHelper::getPackageIntlPricing($package->sale_price) }}">Book Now</button>
                    @else
                    <button type="button" class="btn btn-warning btn-block open_popup_button_header">Book Now</button>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach
    </div>
    @endforeach

    </div>
    </div>
    </div>
    </div>
    </div>
</section>

<section class="accordion-faq" id="_FAQs">

    <div class="container">

        <div class="section-title text-center mb-4 mb-md-5">
            <h2>Questions often asked</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($faqs as $faq)
                <article>
                    <h4 class="">
                        {{ $faq->question }}
                        <i class="fa fa-angle-up"></i>
                    </h4>
                    <div style="display: none;">
                        {{ $faq->answer }}
                    </div>
                </article>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-5">
            {{--<a href="https://api.whatsapp.com/send?phone=919880712456&amp;&amp;text=Hello! I am going through your website courses and I have a question" class="btn btn-round btn-primary mt-2">Still have a question?</a>--}}
            @if(Auth::guard('parent')->user())
            <button type="button" class="btn btn-round btn-warning open_book_demo">
                Schedule A Free Class
            </button>
            @else
            <button type="button" class="btn btn-round btn-warning open_book_demo">Schedule A Free Class</button>
            @endif
        </div>

    </div>
</section>

{{-- @if($relevantcourses->count())
<section class="relevant-course">
    <div class="container-fluid">
        <div class="section-title text-center mb-4 mb-md-5">
            <h2>Other Courses</h2>
        </div>
        <div class="owl-carousel owl-theme" id="class-carousel2">
            @foreach($relevantcourses as $relevantcourse)
            <div class="item">
                <a title="{!! $relevantcourse->name !!}" href="{!! route('frontend.course.show',$relevantcourse->slug) !!}">

                    <div class="course-card">
                        <figure>
                            <img class="img-fluid lazy" src="{!! asset('public/assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset($relevantcourse->image) !!}" alt="image">
                        </figure>
                        <div class="course-card-content">
                            <h3>{!! $relevantcourse->name !!}</h3>
                            <?php $classrating = CustomHelper::getCourseTotalRating($relevantcourse->classes); ?>
                            <?php $avgrating = CustomHelper::CourseAvgRating($course->classes);
                            $roundval = round($avgrating);
                            $avgrating = number_format((float)$avgrating, 1, '.', '');  ?>
                            <div class="rating mb-2">
                                @for($z=1;$z<=$avgrating;$z++) <i class="fa fa-star"></i>
                                    @endfor
                                    <?php $offstar = 5 - ($avgrating);  ?>
                                    @for($z=$offstar;$z>0;$z--)
                                    <i class="fa fa-star-half-o"></i>
                                    @endfor
                                    ({{ $classrating }} Ratings)
                            </div>
                            <div class="">
                                @foreach(ageGroup($relevantcourse->id) as $agegrp)
                                <label class="badge badge-light">{{$agegrp}}</label>
                                @endforeach
                            </div>
                            <span class="btn btn-round btn-warning mt-3">Book Now</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif --}}


<!-- <div class="no-margin-footer">
    @include('includes.frontend1.footer')
</div> -->

<div class="newsletter" style="display: none;">
    <div class="newsletter-contain">
        <i class="fa fa-times close-icon-popup" onclick="inviteClose()"></i>
        <div class="coupon-part p-2 p-sm-4 text-center">
            <img class="mb-4" src="{!! asset('public/assets/frontend/images/logo.png') !!}">
            <div class="coupons">
                <h5>Bambinos Invite Code</h5>
                @if(Auth::guard('parent')->user())
                <input class="clipboard" id="copyCliptext" value="https://www.bambinos.live/courses/{!! $course->slug !!}?referral_code={!! Auth::guard('parent')->user()->referral_code !!}" readonly onclick="copyFunc()">
                @else
                <input class="clipboard" id="copyCliptext" value="" readonly onclick="copyFunc()">
                @endif
                <a href="javascript:void(0);" onclick="copyFunc()" id="myTooltip"><i class="fa fa-clone mr-2"></i>Click To Copy</a>
                <br><br>

            </div>
            <div class="row mt-30">
                <div class="col-sm-4 col-md-4 col-4">
                    <div class="share-boxes">
                        <img src="{!! asset('public/assets/frontend/images/invite-step1.png') !!}" alt="img1">
                        <p>Share with your friends</p>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-4">
                    <div class="share-boxes">
                        <img src="{!! asset('public/assets/frontend/images/invite-step2.png') !!}" alt="img2">
                        <p>Give them free class</p>

                    </div>
                    <div class="dotted-images">
                        <img src="{!! asset('public/assets/frontend/images/invite-dotted-arrow1.png') !!}" alt="dotted-arrow1" class="dotted-line">
                        <img src="{!! asset('public/assets/frontend/images/invite-dotted-arrow2.png') !!}" alt="dotted-arrow2" class="dotted-line2">
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-4">
                    <div class="share-boxes">
                        <img src="{!! asset('public/assets/frontend/images/invite-step3.png') !!}" alt="img3">
                        <p>Earn {!! \App\Helpers\CustomHelper::getCurrencySymbol() !!} {!! \App\Helpers\CustomHelper::getReferralPointsCurrencyFromSession() !!} for every sign-up</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registrationSuccessful" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog popup_width_children" role="document">
        <div class="modal-content">
            <div class="modal-body _200Registration">
                <div class="congrats-part">
                    <div class="congrats">
                        <h3 class="surprise">Congratulations!</h3>
                        <p>You have unlocked welcome pack with two free classes</p>
                    </div>
                </div>
                <div class="_200Booking">
                    <h4>Your Class Details</h4>
                    <div class="_200ClassDetails">
                        <h6>{!! $course->name !!}</h6>
                    </div>
                    <button type="button" class="btn btn-primary btn-round" onclick="refresh_page()">Continue</button>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="bookingSuccessful" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body _200Booking">
                <!--<button type="button" class="close" data-dismiss="modal">×</button>-->
                <h4>Your payment is successful, our team will contact you soon.</h4>
                <div class="done">
                    <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                        <path class="circ path" style="fill:#fff;stroke:#00b1ff;stroke-width:2.4;stroke-linejoin:round;stroke-miterlimit:10;" d="
                    	M30.5,6.5L30.5,6.5c6.6,6.6,6.6,17.4,0,24l0,0c-6.6,6.6-17.4,6.6-24,0l0,0c-6.6-6.6-6.6-17.4,0-24l0,0C13.1-0.2,23.9-0.2,30.5,6.5z" />
                        <polyline class="tick path" style="fill:none;stroke:#00b1ff;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                    	11.6,20 15.9,24.2 26.4,13.8 " />
                    </svg>
                </div>
                <p>Invite your friends & earn {!! \App\Helpers\CustomHelper::getCurrencySymbol() !!} {!! \App\Helpers\CustomHelper::getReferralPointsCurrencyFromSession() !!} per booking</p>

                <div class="coupons">
                    <h5>Your Referral Code</h5>
                    @if(Auth::guard('parent')->user())
                    <input class="clipboard" id="copyCliptext2" value="https://www.bambinos.live/courses/{!! $course->slug !!}?referral_code={!! Auth::guard('parent')->user()->referral_code !!}" readonly onclick="copyFunc2()">
                    @else
                    <input class="clipboard" id="copyCliptext2" value="" readonly onclick="copyFunc2()">
                    @endif
                    <a href="javascript:void(0);" onclick="copyFunc2()" id="myTooltip2"><i class="fa fa-clone mr-2"></i>Click To Copy</a>
                    <br><br>

                </div>
                <a class="btn btn-primary btn-round" href="{!! URL('/') !!}">Browse</a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="bookingFailed" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body _200Booking">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4>Payment Failure!</h4>
                <div class="text-danger font-42">
                    <i class="fa fa-exclamation-triangle"></i>
                </div>
                <p>If your account is debited ,you can contact us to get refund.</p>
                @php
                $defaultWAnumber = Customhelper::defaultWhatsappNumber();
                @endphp

                <a class="btn btn-primary btn-round" target="_blank" href="https://api.whatsapp.com/send?phone={{$defaultWAnumber['mobile_number_with_cc']}}&amp;&amp;text=Hello! Payment Failure, Please Help!">Support</a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade summary-modal" id="summaryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h4 class="modal-title">
                    <button type="button" class="close" data-dismiss="modal"><i class="uil uil-arrow-left"></i></button>
                    Summary
                </h4>

            </div>
            <div class="modal-body p-4">
                <div class="course-img">
                    <img src="{!! asset($course->image) !!}" alt="image">
                </div>
                <div class="course-content">
                    <h3>{!! $course->name !!}</h3>
                    <h5 id="modalpkgtype">Loading..</h5>
                </div>
                <div class="cs-details">
                    <div>
                        <h3>Booking Details </h3>
                        <p class="text-muted my-2" id="bookingagegroup">Loading..</p>
                        <label class="class-number-tag mr-1" id="modalsessions">5 Classes</label>
                        <span id="perclassprice">--</span>
                    </div>
                </div>
            </div>

            <div class="_promocode p-4">
                <label>Promo code(if any)</label>
                <div class="_promobtn-input">
                    <input type="text" class="form-control" id="couponcode" placeholder="Enter promo code">
                </div>
                <div class="_promobtn">
                    <button type="button" class="btn btn-warning applycoupon" data-pkgid="">Apply</button>
                </div>
            </div>

            <div class="cart-top-total px-4 pt-4">
                <div class="cart-total-dil">
                    <h4>Course Base Price</h4>
                    <span id="coursebaseprice">₹ 15000.00</span>
                </div>
                <div class="cart-total-dil">
                    <h4>Taxes</h4>
                    <span id="taxes">₹ 1000.00</span>
                </div>
                <div class="cart-total-dil d-none coupondivshow">
                    <h4>Promocode Discount <label class="badge badge-group couponcodeshow">CHRIS150</label></h4>
                    <span class="text-success discountshow">-₹ 150.00</span>
                </div>
                <div class="cart-total-dil">
                    <h4><b>Sub Total</b></h4>
                    <span id="subtotal"></span>
                </div>
                <div class="wallet-amount mt-3">
                    <input type="checkbox" name="use_wallet" id="use_wallet_box">
                    <label for="use_wallet_box">
                        Use your <b>wallet money <span id="wallet"></span></b>
                    </label>
                </div>
            </div>
            <div class="checkout-cart px-4">
                <h2><small class="d-block mb-1">Total Payable</small><span id="currentpayble"></span></h2>
                <button type="button" class="btn btn-primary paymentroute" data-packageid="">Pay Now</button>
                <!-- <button type="button" class="btn btn-primary paynow" data-courseid="{{ $course->id }}" data-packageid="">Pay Now</button> -->
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="facultydetailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-radius">
            <div class="modal-body p-2">
                <button type="button" class="_close_popup_buton" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <div id="fmodalappend">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <img class="img-fluid" src="" id="giftimg">
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@include('includes.frontend1.js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script>
    $('.paymentroute').click(function() {

        $(this).html('Please Wait...');
        var pkgid = packageid;
        console.log(pkgid);
        var use_wallet = $('#use_wallet_box').is(":checked");
        var couponcode = $('#couponcode').val();

        var formData = new FormData();
        formData.append('packageid', pkgid);
        formData.append('use_wallet', use_wallet);
        formData.append('coupon', couponcode);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: formData,
            url: "{{ route('initiate.booking') }}",
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            dataType: 'json',
            success: function(response) {
                $('.paymentroute').html('Pay Now');
                if (response.success == true) {
                    console.log(response);
                    if (response.payment == true) {
                        var paymentformData = new FormData();
                        paymentformData.append('amount', response.amount);

                        var options = {
                            "key": "rzp_live_oWmqgptjU4N1VA", // Enter the Key ID generated from the Dashboard
                            "amount": response.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": response.currency,
                            "name": response.user.parent_name,
                            "description": "Course Booking ( " + response.course.name + " )",
                            "image": "https://cdn.razorpay.com/logos/IY9FDIJOWFb4aD_medium.jpeg",
                            "order_id": response.order.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                            "handler": function(response) {
                                $('#summaryModal').modal('toggle');
                                $('#bookingSuccessful').modal('show');
                                setTimeout(function() {
                                    $('.done').addClass("drawn");
                                }, 1000);
                            },
                            "prefill": {
                                "name": response.user.name,
                                "email": response.user.email,
                                "contact": response.user.phone
                            },
                            "notes": {
                                "address": "Razorpay Corporate Office"
                            },
                            "theme": {
                                "color": "#3777FF"
                            }

                        };

                        var rzp1 = new Razorpay(options);

                        rzp1.on('payment.failed', function(response) {
                            $('#summaryModal').modal('toggle');
                            $('#bookingFailed').modal('toggle');

                            //   alert(response.error.code);

                            //   alert(response.error.description);

                            //   alert(response.error.source);

                            //   alert(response.error.step);

                            //   alert(response.error.reason);

                            //   alert(response.error.metadata.order_id);

                            //   alert(response.error.metadata.payment_id);

                        });
                        rzp1.open();

                    }
                }
            },

            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $.each(errors.errors, function(index, value) {
                    $("#" + index + "_error").text(value);
                });
                $(".submitbtn").html('Bid');
                $(".submitbtn").attr('disabled', false);
            }
        })
    });

    $('.openfacultymodal').click(function() {
        var fetchurl = $(this).data('action');
        $.post(fetchurl, {
                "_token": "{{ csrf_token() }}"
            },
            function(data) {
                $('#fmodalappend').html(data.content);
            });
        $('#facultydetailModal').modal('toggle');
    })

    var headerHeight = document.querySelector("header").clientHeight;
    document.querySelector(".scroll-nav").style.top = headerHeight - 2 + 'px';

    $('.applycoupon').click(function() {
        var promo = $('#couponcode').val();
        var pkgid = $(this).data('pkgid');
        console.log(promo);
        $('.couponerr').remove();
        if (promo != '') {
            $.post("{{ route('check.booking.coupon') }}", {
                '_token': '{{ csrf_token() }}',
                'package_id': pkgid,
                'code': promo
            }, function(data) {
                if (data.success) {
                    $('#coursebaseprice').html(data.baseprice);
                    $('#subtotal').html(data.subtotal);
                    $('#wallet').html(data.wallet);
                    // $('#paymentroute').prop('href', data.paymentroute);
                    $('#currentpayble').html(data.currentpayablewithoutwallet);
                    payablewithwallet = data.currentpayablewithwallet;
                    payablewithoutwallet = data.currentpayablewithoutwallet;
                    $('#taxes').html(data.tax);
                    if (data.couponcode) {
                        $('.coupondivshow').removeClass('d-none');
                    } else {
                        $('.coupondivshow').addClass('d-none');
                    }
                    $('.couponcodeshow').html(data.couponcode);
                    $('.discountshow').html(data.discount);
                    $('.applycoupon').html('Applied');
                } else {
                    $('#couponcode').after('<span class="text-danger errormessage couponerr">' + data.message + '</span>');
                }
            });
        } else {
            $('#couponcode').after('<span class="text-danger errormessage couponerr">Valid coupon code required</span>');
        }
    });

    $('#couponcode').keyup(function() {
        var val = $(this).val();
        console.log(val);
        if (val == '') {
            $('#couponcode').after('<span class="text-danger errormessage couponerr">Valid coupon code required</span>');
        } else {
            $('.couponerr').html('');
        }
    });

    $('#couponcode').blur(function() {
        $('.couponerr').html('');
    });
    var packageid = null;
    var payablewithwallet = null;
    var payablewithoutwallet = null;
    $('.showpaidbookingmodal').click(function() {
        $('#use_wallet_box').prop('checked', false);
        let courseid = $(this).data('courseid');
        let pkgid = $(this).data('pkgid');
        // $('.paymentroute').attr('data-packageid', pkgid);
        packageid = pkgid;
        let pkgtype = $(this).data('packagetype');
        let minage = $(this).data('minage');
        let maxage = $(this).data('maxage');
        let sessions = $(this).data('sessions');
        $('.applycoupon').attr('data-pkgid', pkgid);
        let perclassprice = $(this).data('perclassprice');
        $('#summaryModal').modal('toggle');
        $('#modalpkgtype').html(pkgtype + ' Package');
        $('#modalsessions').html(sessions + ' Classes');
        $('#perclassprice').html(perclassprice + ' Per Class');
        $('#bookingagegroup').html(pkgtype + ' Package | Age Group : ' + minage + ' - ' + maxage + ' Years');
        $.post("{{ route('get.course.info') }}", {
            '_token': '{{ csrf_token() }}',
            'course_id': courseid,
            'package_id': pkgid,
        }, function(data) {
            $('#coursebaseprice').html(data.baseprice);
            $('#subtotal').html(data.subtotal);
            console.log(data.subtotal);
            $('#wallet').html(data.wallet);
            // $('#paymentroute').prop('href', data.paymentroute);
            $('#currentpayble').html(data.currentpayablewithoutwallet);
            payablewithwallet = data.currentpayablewithwallet;
            payablewithoutwallet = data.currentpayablewithoutwallet;
            $('#taxes').html(data.tax);
        });
    });

    $('.paynow').click(function() {
        let courseid = $(this).data('courseid');
        $(this).html('<i class="fa fa-spinner fa-spin" style="font-size:20px"></i>');
        let use_wallet = $('#use_wallet_box').is(':checked');

        // $.post("{{ route('initiate.booking') }}",
        // {
        //     '_token' : '{{ csrf_token() }}',
        //     'courseid': courseid,
        //     'packageid': packageid,
        //     'use_wallet' : use_wallet
        // },
        // function(data, status){
        //     console.log("Data: " + data + "\nStatus: " + status);
        // });
    });

    $('#use_wallet_box').click(function() {
        if ($(this).is(":checked")) {
            $('#currentpayble').html(payablewithwallet);
        } else {
            $('#currentpayble').html(payablewithoutwallet);
        }

    })

    $('.package').click(function() {
        var classid = $(this).data('classid');
        $('.allpackage').addClass('d-none');
        $('.package' + classid).removeClass('d-none');
    })
    $('.module').click(function() {
        var classid = $(this).data('classid');
        $('.modules').hide();
        $('.module' + classid).show();
    });



    var obj = document.getElementById('partitioned');
    obj.addEventListener('keydown', stopCarret);
    obj.addEventListener('keyup', stopCarret);

    function stopCarret() {
        if (obj.value.length > 3) {
            setCaretPosition(obj, 3);
        }
    }

    function setCaretPosition(elem, caretPos) {
        if (elem != null) {
            if (elem.createTextRange) {
                var range = elem.createTextRange();
                range.move('character', caretPos);
                range.select();
            } else {
                if (elem.selectionStart) {
                    elem.focus();
                    elem.setSelectionRange(caretPos, caretPos);
                } else
                    elem.focus();
            }
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("scroll", onScroll);

        $('.scroll-nav-menu li a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            $(document).off("scroll");

            $('.scroll-nav-menu li a').each(function() {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 70
            }, 500, 'swing', function() {
                //window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    });

    function onScroll(event) {
        var scrollPos = $(document).scrollTop();
        $('.scroll-nav-menu li a').each(function() {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.scroll-nav-menu li a').removeClass("active");
                currLink.addClass("active");
            } else {
                currLink.removeClass("active");
            }
        });
    }

    // Higher number = more zoom
    let scaleAmount = 0.55;

    function scrollZoom() {
        const images = document.querySelectorAll("[data-scroll-zoom]");
        let scrollPosY = 0;
        scaleAmount = scaleAmount / 100;

        const observerConfig = {
            rootMargin: "0% 0% 0% 0%",
            threshold: 0
        };

        // Create separate IntersectionObservers and scroll event listeners for each image so that we can individually apply the scale only if the image is visible
        images.forEach(image => {
            let isVisible = false;
            const observer = new IntersectionObserver((elements, self) => {
                elements.forEach(element => {
                    isVisible = element.isIntersecting;
                });
            }, observerConfig);

            observer.observe(image);

            // Set initial image scale on page load
            image.style.transform = `scale(${1 + scaleAmount * percentageSeen(image)})`;

            // Only fires if IntersectionObserver is intersecting
            window.addEventListener("scroll", () => {
                if (isVisible) {
                    scrollPosY = window.pageYOffset;
                    image.style.transform = `scale(${1 +
                scaleAmount * percentageSeen(image)})`;
                }
            });
        });

        // Calculates the "percentage seen" based on when the image first enters the screen until the moment it leaves
        // Here, we get the parent node position/height instead of the image since it's in a container that has a border, but
        // if your container has no extra height, you can simply get the image position/height
        function percentageSeen(element) {
            const parent = element.parentNode;
            const viewportHeight = window.innerHeight;
            const scrollY = window.scrollY;
            const elPosY = parent.getBoundingClientRect().top + scrollY;
            const borderHeight = parseFloat(getComputedStyle(parent).getPropertyValue('border-bottom-width')) + parseFloat(getComputedStyle(element).getPropertyValue('border-top-width'));
            const elHeight = parent.offsetHeight + borderHeight;

            if (elPosY > scrollY + viewportHeight) {
                // If we haven't reached the image yet
                return 0;
            } else if (elPosY + elHeight < scrollY) {
                // If we've completely scrolled past the image
                return 100;
            } else {
                // When the image is in the viewport
                const distance = scrollY + viewportHeight - elPosY;
                let percentage = distance / ((viewportHeight + elHeight) / 100);
                percentage = Math.round(percentage);

                return percentage;
            }
        }
    }

    scrollZoom();
</script>

<script>
    $(".accordion-faq article h4").on("click", function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this)
                .siblings(".accordion-faq article div")
                .slideUp(200);
            $(".accordion-faq article h4 i")
                .removeClass("fa fa-angle-down")
                .addClass("fa fa-angle-up");
        } else {
            $(".accordion-faq article h4 i")
                .removeClass("fa fa-angle-down")
                .addClass("fa fa-angle-up");
            $(this)
                .find("i")
                .removeClass("fa fa-angle-up")
                .addClass("fa fa-angle-down");
            $(".accordion-faq article h4").removeClass("active");
            $(this).addClass("active");
            $(".accordion-faq article div").slideUp(200);
            $(this)
                .siblings(".accordion-faq article div")
                .slideDown(200);
        }
    });

    if ($('body').hasClass('contentHold')) {
        $('body').removeClass('contentHold')
    }

    // if($('.review-block').length)
    // {
    //     var ratingHeight = document.querySelector(".comment").clientHeight;
    //     if(ratingHeight > 250)
    //     {
    //         $('.comment').addClass('_maxComment')
    //         $("._ShowM").slideDown('slow');
    //     }
    //     $("._ShowM").click(function(){
    //         $(this).hide();
    //         $('.comment').removeClass('_maxComment')
    //     });
    // }

    // $(".mobile-course-package .checkout-address input").click(function(){
    //     $(this).attr();
    // });

    // if($(window).width() > 576){
    //     $('.mobile-course-package').remove();
    // }
    // else{
    //     $('.curriculam-overflow').remove();
    // }


    $('#educators-carousel').owlCarousel({
        items: 1,
        loop: false,
        margin: 30,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay: false,
        autoplayTimeout: 7000,
        autoplaySpeed: 1300,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            1100: {
                items: 3
            },
            992: {
                items: 2
            },
            768: {
                items: 2
            },
            480: {
                items: 1
            },

            0: {
                items: 1,
                margin: 15,
                autoplay: false,
                nav: false,
                stagePadding: 20
            }
        }
    });
    $('#class-carousel2').owlCarousel({
        items: 1,
        loop: false,
        margin: 30,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1300,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            1100: {
                items: 3
            },
            992: {
                items: 3
            },
            768: {
                items: 3
            },
            480: {
                items: 1
            },
            0: {
                items: 1
            }
        }
    });
</script>

<script>
    $(function() {
        var numberOfStars = 70;

        for (var i = 0; i < numberOfStars; i++) {
            $('.congrats').append('<div class="blob fa fa-star ' + i + '"></div>');
        }

        animateText();

        animateBlobs();
    });

    $('.congrats').click(function() {
        reset();

        animateText();

        animateBlobs();
    });

    function reset() {
        $.each($('.blob'), function(i) {
            TweenMax.set($(this), {
                x: 0,
                y: 0,
                opacity: 1
            });
        });

        TweenMax.set($('.surprise'), {
            scale: 1,
            opacity: 1,
            rotation: 0
        });
    }

    function animateText() {
        TweenMax.from($('.surprise'), 0.8, {
            scale: 0.7,
            opacity: 0,
            rotation: 15,
            ease: Back.easeOut.config(4),
        });
    }

    function animateBlobs() {

        var xSeed = _.random(250, 280);
        var ySeed = _.random(120, 170);

        $.each($('.blob'), function(i) {
            var $blob = $(this);
            var speed = _.random(1, 5);
            var rotation = _.random(5, 100);
            var scale = _.random(0.8, 1.5);
            var x = _.random(-xSeed, xSeed);
            var y = _.random(-ySeed, ySeed);

            TweenMax.to($blob, speed, {
                x: x,
                y: y,
                ease: Power1.easeOut,
                opacity: 0,
                rotation: rotation,
                scale: scale,
                onStartParams: [$blob],
                onStart: function($element) {
                    $element.css('display', 'block');
                },
                onCompleteParams: [$blob],
                onComplete: function($element) {
                    $element.css('display', 'none');
                }
            });
        });
    }
</script>

<script>
    function invite() {
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: "{{ route('parent.update.referalcode') }}",
            //processData : false, // Don't process the files
            //contentType : false, // Set content type to false as jQuery will tell the server its a query string request
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    var cc1 = $('#copyCliptext').val();
                    var cc2 = $('#copyCliptext2').val();

                    if (cc1 == null) {
                        $('#copyCliptext').val(response.data);
                    }

                    if (cc2 == null) {
                        $('#copyCliptext2').val(response.data);
                    }
                } else {
                    //$.notify(""+response.data+"", {type:"danger"});
                }
            },
            error: function(data) {
                /*var errors = $.parseJSON(data.responseText);
                $.each(errors, function(index, value) {
                            $.notify(""+value+"", {type:"danger"});
                });*/
                //$.notify("Mobile number should be valid 10 digit number", {type:"danger"});
            }
        });

        $(".newsletter").fadeIn();

    }

    function inviteClose() {
        $(".newsletter").fadeOut();
    }

    var is_loggedin = '{!! Auth::guard("parent")->user() !!}';

    function copyFunc() {

        var currurl2 = 'https://' + window.location.hostname + window.location.pathname;

        //$('#copyCliptext').val(currurl2);
        var copyText = document.getElementById("copyCliptext");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");

        var tooltip = document.getElementById("myTooltip");

        if (is_loggedin) {
            tooltip.innerHTML = "<i class='fa fa-check mr-2'></i> Copied";
        } else {
            tooltip.innerHTML = "<i class='fa fa-check mr-2'></i> Copied";
        }
    }
</script>

<script>
    function demoClassWarning() {
        $('.selctbookingtypeclass').prop('checked', false);
        swal({
            title: 'Attention!',
            text: 'Please note you have booked maximum no. of demo limit. You may now book the complete course or try another class',
            timer: 4000,
            //cancelButtonText: "No, cancel it!",
            showCancelButton: false,
            showConfirmButton: false
        });
    }
</script>

<script>
    var confetti = {
        maxCount: 750,
        speed: 3,
        frameInterval: 15,
        alpha: 1,
        gradient: !1,
        start: null,
        stop: null,
        toggle: null,
        pause: null,
        resume: null,
        togglePause: null,
        remove: null,
        isPaused: null,
        isRunning: null
    };
    ! function() {
        confetti.start = s, confetti.stop = w, confetti.toggle = function() {
            e ? w() : s()
        }, confetti.pause = u, confetti.resume = m, confetti.togglePause = function() {
            i ? m() : u()
        }, confetti.isPaused = function() {
            return i
        }, confetti.remove = function() {
            stop(), i = !1, a = []
        }, confetti.isRunning = function() {
            return e
        };
        var t = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window
            .mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame,
            n = ["rgba(30,144,255,", "rgba(107,142,35,", "rgba(255,215,0,", "rgba(255,192,203,", "rgba(106,90,205,",
                "rgba(173,216,230,", "rgba(238,130,238,", "rgba(152,251,152,", "rgba(70,130,180,",
                "rgba(244,164,96,", "rgba(210,105,30,", "rgba(220,20,60,"
            ],
            e = !1,
            i = !1,
            o = Date.now(),
            a = [],
            r = 0,
            l = null;

        function d(t, e, i) {
            return t.color = n[Math.random() * n.length | 0] + (confetti.alpha + ")"), t.color2 = n[Math.random() *
                    n.length | 0] + (confetti.alpha + ")"), t.x = Math.random() * e, t.y = Math.random() * i - i, t
                .diameter = 10 * Math.random() + 5, t.tilt = 10 * Math.random() - 10, t.tiltAngleIncrement = .07 *
                Math.random() + .05, t.tiltAngle = Math.random() * Math.PI, t
        }

        function u() {
            i = !0
        }

        function m() {
            i = !1, c()
        }

        function c() {
            if (!i)
                if (0 === a.length) l.clearRect(0, 0, window.innerWidth, window.innerHeight), null;
                else {
                    var n = Date.now(),
                        u = n - o;
                    (!t || u > confetti.frameInterval) && (l.clearRect(0, 0, window.innerWidth, window.innerHeight),
                        function() {
                            var t, n = window.innerWidth,
                                i = window.innerHeight;
                            r += .01;
                            for (var o = 0; o < a.length; o++) t = a[o], !e && t.y < -15 ? t.y = i + 100 : (t
                                .tiltAngle += t.tiltAngleIncrement, t.x += Math.sin(r) - .5, t.y += .5 * (Math
                                    .cos(r) + t.diameter + confetti.speed), t.tilt = 15 * Math.sin(t.tiltAngle)
                            ), (t.x > n + 20 || t.x < -20 || t.y > i) && (e && a.length <= confetti
                                .maxCount ? d(t, n, i) : (a.splice(o, 1), o--))
                        }(),
                        function(t) {
                            for (var n, e, i, o, r = 0; r < a.length; r++) {
                                if (n = a[r], t.beginPath(), t.lineWidth = n.diameter, i = n.x + n.tilt, e = i + n
                                    .diameter / 2, o = n.y + n.tilt + n.diameter / 2, confetti.gradient) {
                                    var l = t.createLinearGradient(e, n.y, i, o);
                                    l.addColorStop("0", n.color), l.addColorStop("1.0", n.color2), t.strokeStyle = l
                                } else t.strokeStyle = n.color;
                                t.moveTo(e, n.y), t.lineTo(i, o), t.stroke()
                            }
                        }(l), o = n - u % confetti.frameInterval), requestAnimationFrame(c)
                }
        }

        function s(t, n, o) {
            var r = window.innerWidth,
                u = window.innerHeight;
            window.requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window
                .msRequestAnimationFrame || function(t) {
                    return window.setTimeout(t, confetti.frameInterval)
                };
            var m = document.getElementById("confetti-canvas");
            null === m ? ((m = document.createElement("canvas")).setAttribute("id", "confetti-canvas"), m
                .setAttribute("style", "display:block;z-index:999999;pointer-events:none;position:fixed;top:0"),
                document.body.prepend(m), m.width = r, m.height = u, window.addEventListener("resize",
                    function() {
                        m.width = window.innerWidth, m.height = window.innerHeight
                    }, !0), l = m.getContext("2d")) : null === l && (l = m.getContext("2d"));
            var s = confetti.maxCount;
            if (n)
                if (o)
                    if (n == o) s = a.length + o;
                    else {
                        if (n > o) {
                            var f = n;
                            n = o, o = f
                        }
                        s = a.length + (Math.random() * (o - n) + n | 0)
                    }
            else s = a.length + n;
            else o && (s = a.length + o);
            for (; a.length < s;) a.push(d({}, r, u));
            e = !0, i = !1, c(), t && window.setTimeout(w, t)
        }

        function w() {
            e = !1
        }
    }();
    // custom js
    //confetti.start();
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": "1",
            "item": {
                "@type": "Course",
                "url": "https://bambinos.live/course/phonics",
                "name": "Young Readers Program",
                "description": "Phonics is a method of teaching the alphabetic language through corresponding sounds and pronunciations. Phonics plays an imperative role in shaping a solid foundation of language and words. The program helps children grasp the sounds associated with each alphabet letter through rhymes, stories and interactive activities and is a brilliant headstart to mastering linguistic abilities in children.",
                "provider": {
                    "@type": "Organization",
                    "name": "Bambinos Learning Solutions Pvt. Ltd.",
                    "sameAs": "https://bambinos.live"
                }
            }
        }, {
            "@type": "ListItem",
            "position": "2",
            "item": {
                "@type": "Course",
                "url": "https://bambinos.live/course/Young-creative-writers",
                "name": "Young Creative Writers",
                "description": "This unique program is about tapping your children’s imagination and creativity while enriching their linguistic skills in the world’s fastest-growing language.",
                "provider": {
                    "@type": "Organization",
                    "name": "Bambinos Learning Solutions Pvt. Ltd.",
                    "sameAs": "https://bambinos.live"
                }
            }
        }, {
            "@type": "ListItem",
            "position": "3",
            "item": {
                "@type": "Course",
                "url": "https://bambinos.live/course/young-communicator-program",
                "name": "Young Communicator Program",
                "description": "At Kid's Talk, we believe children should have a platform to express themselves confidently. Our program helps your child develop strong verbal and written communication skills through fun activities and expert guidance.",
                "provider": {
                    "@type": "Organization",
                    "name": "Bambinos Learning Solutions Pvt. Ltd.",
                    "sameAs": "https://bambinos.live"
                }
            }
        }, {
            "@type": "ListItem",
            "position": "4",
            "item": {
                "@type": "Course",
                "url": "https://bambinos.live/course/bhagavad-gita-classes-for-kids",
                "name": "Bhagavad Gita: A Journey for Kids",
                "description": "Discover the ancient teachings of the Bhagavad Gita in fun and engaging way designed for kids aged 4-14. Our program helps your child acquire essential life skills, values, and cultural knowledge to excel.",
                "provider": {
                    "@type": "Organization",
                    "name": "Bambinos Learning Solutions Pvt. Ltd.",
                    "sameAs": "https://bambinos.live"
                }
            }
        }]
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "How do such courses help?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We have built a platform to develop kids with their personalities so that they stand out in the crowd. Parents can choose a program for their kid which is made by the experts from the best universities such as Trinity College, London, IIMs."
            }
        }, {
            "@type": "Question",
            "name": "Are your batches age-specific?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, all group classes will be as per the age of the child."
            }
        }, {
            "@type": "Question",
            "name": "Are your classes pre-recorded or live & how many kids do you teach in one class?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "All our classes are Live & Interactive. We strongly believe in specialised and focused teaching along with peer collaboration. This is why we have small group classes with 1 teacher for 4 kids maintaining a 1:4 ratio."
            }
        }, {
            "@type": "Question",
            "name": "Who designs your courses?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Each course is designed by our in-house special curriculum and pedagogy team with experience of over 30+ years. As an example, our young leaders' program is built by experts from Trinity College, London, and is vetted by industry stalwarts."
            }
        }, {
            "@type": "Question",
            "name": "Who are the teachers and how do you maintain the quality of teachers?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Each of our teachers is an educator with prior experience of 3+ years in the field. Our educators go through a complete background check and a review of their past experiences, learning pedagogies, and study material. We work with the final motive of providing the best curriculum by the best teachers."
            }
        }, {
            "@type": "Question",
            "name": "How long are your programs?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We have divided our programs into 24 sessions (3 Months), 48 sessions (6 Months), and 96 sessions (12 Months)."
            }
        }, {
            "@type": "Question",
            "name": "How can I keep track of my child’s progress?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Post enrollment, you will be given your personalized panel where you can find all important progress reports, teachers’ assessments, classes’ schedules, and recordings. You will have lifetime access to the panel."
            }
        }, {
            "@type": "Question",
            "name": "Is there any Showdown/Showcase at the end of the course?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Every month we bring a series of Showdown/Showcase for the kids. At the end of each Showcase, every kid gets a certificate and feedback from industry stalwarts judging the Showcase"
            }
        }, {
            "@type": "Question",
            "name": "How can I sign up for a free demo?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You can book up to a maximum of two free demos from our website. Post booking, you will receive all relevant details on your WhatsApp and email address."
            }
        }, {
            "@type": "Question",
            "name": "What do I get in a free demo?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You get a firsthand experience of our course from our teaching methodology to our curriculum with this you also get to understand kids' comfort with our awesome teachers"
            }
        }, {
            "@type": "Question",
            "name": "Can I reschedule my Demo session?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We understand that being a parent is a full-time job. If you want to reschedule your session just let us know six hours before class start time and we will be happy to reschedule the demo for you."
            }
        }, {
            "@type": "Question",
            "name": "What is the class timing?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Our team will provide you with available slots and you can pick and choose the session that works best for you and your kids."
            }
        }, {
            "@type": "Question",
            "name": "What happens if my kid misses a class?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You will be allowed to cancel six hours before class start time. If you miss cancelling the class, you will be provided with a recording of the class."
            }
        }, {
            "@type": "Question",
            "name": "What are the charges for your courses?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We offer a clear and well-structured payment plan. You can select the plan according to the number of sessions you want to buy. All our prices are listed on our website in a very transparent way. Please note we have kept one of the best pricing in the industry and we guarantee no one can beat our prices for the quality of education we offer. All our prices are fixed and we don’t negotiate. Thanks for your cooperation."
            }
        }, {
            "@type": "Question",
            "name": "What is your refund policy?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We offer a pro-rata refund (Post taxes + payment gateway transaction charges) for any unattended classes for one on one sessions. For our group classes, there is no refund after the child has attended four classes."
            }
        }]
    }
</script>
<script>
    $(document).ready(function() {
        @if(Auth::guard('parent')->check())
        var parentEmail = "{{ Auth::guard('parent')->user()->email }}";
        var parentNumber = "{{ Auth::guard('parent')->user()->whatsapp_number }}";
        var parentCountryCode = "{{ Auth::guard('parent')->user()->whatsapp_country_code }}";
        $('#parent_email').val(parentEmail);
        $('#parent_number').val(parentNumber);
        $('#parent_country').val(parentCountryCode);
        $('#parent_country').val(parentCountryCode).trigger('change');
        @endif
    });
</script>
<script>
    $(document).ready(function() {
        $('input[type="radio"][name="module"]').on('change', function() {
            var classId = $(this).data('classid');
            $('html, body').animate({
                scrollTop: $(".about-course-tab-block").offset().top
            }, 500);
            $('.modules').hide();
            $('.module' + classId).show();
        });
    });

    document.querySelector('.btn-outline-primary').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#hero-banner').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
@endsection
