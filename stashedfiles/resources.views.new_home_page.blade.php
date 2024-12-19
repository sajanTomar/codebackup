@extends('layouts.frontend')

@section('css')
    <title>Bambinos.live - School of English Communication For Kids</title>
    <meta name="title" content="Bambinos.live - School of English Communication For Kids">
    <meta name="description" content="Bambinos offers tailored programs for kids designed to promote leadership and communication skills.designed to boost confidence and enhance their English skills">
    <meta name="keywords" content="Online e-learning Platform for kids">
    <meta name="DC.title" content="Bambinos.live - School of English Communication For Kids"/>

    <!-- Twitter Card-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@BambinosLive">
    <meta name="twitter:title" content="Bambinos.live - School of English Communication For Kids">
    <meta name="twitter:description" content="Bambinos offers tailored programs for kids designed to promote leadership and communication skills.designed to boost confidence and enhance their English skills">
    <meta name="twitter:image" content="{{asset('assets/frontend1/images/meta-image.png')}}">
    <!-- open graph -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="Website">
    <meta property="og:title" content="Bambinos.live - School of English Communication For Kids">
    <meta property="og:description" content="Bambinos offers tailored programs for kids designed to promote leadership and communication skills.designed to boost confidence and enhance their English skills">
    <meta property="og:image" content="{{asset('assets/frontend1/images/meta-image.png')}}">
    <meta property="og:url" content="https://www.bambinos.live/">

    <link rel="canonical" href="https://www.bambinos.live/">
    @include('includes.frontend1.css')
    <meta name="facebook-domain-verification" content="iezfcr0dbtrdc8lanz2q3xhk894yz5" />
    <style>
        /* header{
            display: none
        } */
        canvas{
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
        .snow-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; /* So the snowflakes don't interfere with other elements */
            z-index: 1000; /* Ensure it is on top of other elements */
        }

        @keyframes fall {
            0% {
                transform: translateX(0) translateY(-10vh);
                opacity: 1;
            }
            50% {
                transform: translateX(calc(-10vw + 20vw * var(--random-x))) translateY(50vh);
                opacity: 0.8;
            }
            100% {
                transform: translateX(calc(-20vw + 40vw * var(--random-x))) translateY(110vh);
                opacity: 0;
            }
        }

        .snowflake {
            position: absolute;
            top: -30px;
            background: white;
            border-radius: 50%;
            animation: fall linear infinite;
        }
        @media (max-width: 768px){
            header {
                display: block!important
            }
        }
        .carousel-item {
            height: 400px;
        }
        .carousel-item img {
            height: 100%;
            object-fit: cover;
        }
        .container.mt-5 {
            margin-top: 5rem;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: transparent;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .carousel-control-prev,
        .carousel-control-next {
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
        }
        .image-container {
            padding-left: 15px;
            padding-right: 15px;
        }
        .stories-sec h1 {
            color: #3777FF;
        }
    </style>
@endsection

@section('content')
{{-- 
<div class="header-strip text-center py-2" id="confetti-btn">
    <div class="container">
        <img class="tag-icon" src="{!! asset('assets/frontend1/images/achivement.png') !!}">
        <span><b class="b-font">Bambinos.live</b> is the "<b class="text-danger">Rising Edtech of the Year</b>" by </span>
        <img class="entrepreneur-logo" src="{!! asset('assets/frontend1/images/entrepreneur-india.png') !!}">
    </div>
</div> --}}

{{--<div class="modal fade" id="liveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-radius">
            
            <div class="modal-body p-4">
                <button type="button" class="_close_popup_buton" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <div class="text-center mb-4">
                    <img height="80" src="{!! asset('assets/frontend1/images/bambinos-large.png') !!}">
                </div>
                <div class="text-center mb-4">
                    <h4 class="mb-3">Register your child for Bambinos Sunday(20th Feb) Showcase!</h4>
                    <h5><a href="https://www.bambinos.live/courses/poetry-recitation-showcase-4-to-6-yrs">Poetry Recitation - Showcase (4-6 Years)</a></h5>
                    <h5><a href="https://www.bambinos.live/courses/jam-showcase-6-to-8-yrs">Awesome Orator - JAM Showcase (6-8 Years)</a></h5>
                    <h5><a href="https://www.bambinos.live/courses/elocution-showcase-9-to-12-yrs">Elocution - Showcase (9-12 Years)</a></h5>
                </div>
                <div class="text-center">
                        <small class="text-danger">Slots filling fast. <b>Only few spots left</b></small>
                </div>
            </div>
        </div>
    </div>
</div>--}}

    @include('includes.frontend1.header')
    <div class="snow-container" aria-hidden="true">

    <section class="home-video-banner parallax">
        <video id="myVideo" autoplay="" muted="" preload="auto" loop playsinline="" poster="{!! asset('assets/frontend1/video/welcome_video_thumbnail.png') !!}">
            <source src="{!! asset('assets/frontend1/video/welcome_video.mp4') !!}" type="video/mp4" />
        </video>
        
        <div class="banner-area">
            <div class="container">
                <div class="banner-welcome">
                    <img src="{!! asset('assets/frontend1/images/bambinos-importance.png') !!}" class="rellax" data-rellax-speed="1">
                    <h1 class="h1-hidden">India's #1 English Communication School for Kids</h1>
                    <article class="article-h1">Speak Confidently, Write Brilliantly 
                        {{-- <span class="d-block d-sm-block">Communicate Like a Leader</span> --}}
                    </article>
                    <h2>Just 2 hours a week with bambinos will build essential communication skills in your child</h2>
                    @if(Auth::guard('parent')->user())
                        <button type="button" class="btn btn-round btn-light text-uppercase mt-5 d-none d-md-inline-block" data-toggle="modal" data-target="#demoModal">
                        Schedule a free demo
                        </button>
                    @else
                        <button type="button" class="btn btn-round btn-light text-uppercase mt-5 d-none d-md-inline-block open_book_demo">Schedule a free demo</button>
                    @endif 
                </div>
            </div>
        </div>
        
    </section>

    <section class="problem-sec">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-9 col-md-9 text-right">
                    <div class="section-title mb-3">
                        <h2>India's #1 School<br> of English Communication</h2>
                    </div> 
                    
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-xl-8 col-lg-9 col-md-12 text-right">
                    <div class="row ">
                        <div class="col-12 col-md-4 text-center three-icon my-3 my-md-5">
                            <img class="mb-4" src="{!! asset('assets/frontend/images/category/phonics.png') !!}" alt="icon">
                            <h5>The Best Teachers, Hands Down</h5>
                            <label>Bambinos carefully vets India's top 1% educators. All teachers have a minimum bachelor's degree and at least 2 years of teaching experience</label>
                        </div>
                        <div class="col-12 col-md-4 text-center three-icon my-3 my-md-5">
                            <img class="mb-4" src="{!! asset('assets/frontend/images/icon5.svg') !!}" alt="icon">
                            <h5>100M+ Minutes of Teaching</h5>
                            <label>We are India's No.1 online academy on English learning. Our curriculum is backed by more than a decade of research by experts in the field.</label>
                        </div>
                        <div class="col-12 col-md-4 text-center three-icon my-3 my-md-5">
                            <img class="mb-4" src="{!! asset('assets/frontend/images/icon2.svg') !!}" alt="icon">
                            <h5>Trusted by 10K+<br>Parents</h5>
                            <label>Our secure, proprietary platform uses cutting-edge technology to make our classes effective, safe, and enjoyable.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <canvas id="wcanvas"></canvas> -->

    {{--<section class="importance-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 order-lg-2 text-center">
                    <div class="importance-img">
                        <img src="{!! asset('assets/frontend1/images/bambinos-importance.png') !!}" class="rellax" data-rellax-speed="2">
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="section-title mb-3">
                        <h4>Early</h4>
                        <h2>Development</h2>
                    </div>
                    <h5 class="mb-4">Of Communication skills in your child Lasts A Lifetime!</h5>
                    <p>Each child has an abundance of potential waiting to be given the right direction. Exposure to life-skills at an early age can set them on a path to become leaders in everyday life.</p>
                     @if(Auth::guard('parent')->user())
                        <button type="button" class="btn btn-round btn-outline-primary text-uppercase mt-5" data-toggle="modal" data-target="#demoModal">
                            Book A Free class
                        </button>
                    @else
                        <button type="button" class="btn btn-round btn-outline-primary text-uppercase mt-5 open_book_demo">Book A Free class</button>
                    @endif 
                </div>
            </div>
        </div>
    </section>

    <section class="importance-sec-two mt-3 d-lg-none">
        <div class="container">
            <div class="section-title mb-3">
                <h4>Early</h4>
                <h2>Development</h2>
            </div>
            <h5 class="mb-4">Of Leadership Traits Lasts A Lifetime!</h5>
            <p>Each child has an abundance of potential waiting to be given the right direction. Exposure to life-skills at an early age can set them on a path to become leaders in everyday life.</p>
            @if(Auth::guard('parent')->user())
                <button type="button" class="btn btn-round btn-outline-primary text-uppercase mt-5" data-toggle="modal" data-target="#demoModal">
                    Book A Free class
                </button>
            @else
                <button type="button" class="btn btn-round btn-outline-primary text-uppercase mt-5 open_book_demo">Book A Free class</button>
            @endif  
        </div>
    </section>--}}

    <section class="why-sec">
        <div class="why-left text-center">
            <div class="why-bambinos-bg">
                <img src="{!! asset('assets/frontend1/images/bambinos-large.png') !!}" class="rellax" data-rellax-speed="2.5">
            </div>
            <img class="img-fluid why-boy lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/young-boy.png') !!}" alt="icon">
        </div>
        <div class="why-right">
            <div class="section-title mb-4">
                <h2>Why bambinos</h2>
            </div>
            <ul class="step step-dashed mb-3">
                <li class="step-item">
                  <div class="step-content-wrapper">
                    <span class="step-icon">1</span>
                    <div class="step-content">
                      <h5 class="step-title">1-on-1 and 1-on-4 dedicated teaching</h5>
                      <p>Dedicated teaching and interactions through 1-on-1 and small group classes to meet the personalized learning needs.</p>
                    </div>
                  </div>
                </li>
                <li class="step-item">
                    <div class="step-content-wrapper">
                      <span class="step-icon">2</span>
                      <div class="step-content">
                        <h5 class="step-title">Immersive Experience</h5>
                        <p>The best way to pick up a language is to immerse yourself in it. We engage children through interactive content, fun animations, and diverse real-life scenarios.</p>
                      </div>
                    </div>
                </li>
                <li class="step-item">
                    <div class="step-content-wrapper">
                      <span class="step-icon">3</span>
                      <div class="step-content">
                        <h5 class="step-title">Top 1% Educators</h5>
                        <p>Real-time teaching and guidance is provided by professional and credible teachers. </p>
                      </div>
                    </div>
                </li>
                {{-- <li class="step-item mb-0">
                  <div class="step-content-wrapper">
                    <span class="step-icon">4</span>
                    <div class="step-content">
                      <h5 class="step-title">Complete Learning System</h5>
                      <p class="mb-0">A comprehensive assessment system shows learning progress and offers the most suitable learning plan.</p>
                    </div>
                  </div>
                </li> --}}
            </ul>
            @if(Auth::guard('parent')->user())
                <button type="button" class="btn btn-round btn-warning text-uppercase" data-toggle="modal" data-target="#demoModal">
                Book a free Class
                </button>
            @else
                <button type="button" class="btn btn-round btn-warning text-uppercase open_book_demo">Book a free Class</button>
            @endif 
        </div>
    </section>

    <section class="features-sec">
        <div class="container-fluid">
            <div class="section-title text-center mb-3">
                <h2>Programs designed to build<br>confident communicators</h2>
                <h3 class="mt-3">Our Courses</h3>
            </div>
            @php
                $hideArr = [];
                if(session('geoplugin_country') == 'IN')
                {
                    $hideArr = ['bhagavad-gita-classes-for-kids'];
                }
            @endphp
            @if($relevantcourses->count())
            <div class="row justify-content-center courses-row">
                @foreach($relevantcourses as $relevantcourse)
                    @if(!in_array($relevantcourse->slug, $hideArr))
                    <div class="col-12 col-md-6 col-lg-4 p-3">
                            @if(isset($relevantcourse->classes[0]) && $relevantcourse->classes[0]->type == 'Drop-In')
                            <a href="{!! route('frontend.course.show',$relevantcourse->slug) !!}" title="{!! $relevantcourse->name !!}">
                            @else
                            <a href="{!! route('frontend.course.show',$relevantcourse->slug) !!}" title="{!! $relevantcourse->name !!}">
                            @endif
                            <div class="course-card">
                                <figure>
                                    <img class="img-fluid lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset($relevantcourse->image) !!}" alt="image">
                                </figure>
                                <div class="course-card-content">
                                    <h3>{!! $relevantcourse->name !!}</h3>
                                    <div class="">
                                            @foreach(ageGroup($relevantcourse->id) as $agegrp)
                                                <label class="badge badge-light">{{$agegrp}}</label>
                                            @endforeach
                                    </div>
                                    {{--<p>{!! strlen($relevantcourse->short_desciption) > 62 ? substr($relevantcourse->short_desciption, 0, 62).'..' : $relevantcourse->short_desciption !!}</p>--}}
                                    <span class="btn btn-round btn-warning mt-3" data-cntry="{{session('geoplugin_country')}}">Book Now</span>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endif
                @endforeach
            </div>
            @endif
        </div>
        
    </section>

    <section class="learnathon-sec my-5" style="text-align: center;">
        <div class="container-fluid">
            <h1 style="font-weight: bold;">Learnathon</h1>
            <div class="learnathon-content mt-4">
                <figure style="margin: 0;">
                    <a href="/learnathon">
                        <img class="img-fluid" src="{!! asset('assets/frontend1/images/LEARN-A-THON-Banner-image.jpg') !!}" alt="Learnathon Event Image" style="width: 100vw; max-height: 90vh; position: relative; left: 50%; transform: translateX(-50%);">
                        <style>
                            @media (max-width: 576px) {
                                .learnathon-sec img {
                                    height: 32vh;
                                }
                            }
                        </style>
                    </a>
                </figure>
                <div class="mt-3">
                    <a href="/learnathon" class="btn btn-primary btn-round text-dark" style="background-color: #fde054; padding: 10px 20px; font-size: 1rem;">Read more about Learn-A-Thon</a>
                </div>
            </div>
        </div>
    </section>

    <section class="curriculum-image-sec mb-5 pb-5">
        <div class="container px-0">
            <div class="section-title text-center mb-0">
                <h2>Bambinos' Curriculum Structure</h2>
            </div>
            <div class="overflow-x">
                <img class="img-fluid lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/curriculum-structure.png') !!}" alt="Curriculum Structure">
            </div>
        </div>
    </section>

    <!-- OUR SUCCESS STORIES SECTION -->
    <section class="stories-sec mb-5 pb-5">
        <div class="container-fluid mt-5 mb-5">
            <h1 class="text-center mb-4">Our Success Stories</h1>
            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-one.jpg') !!}" class="d-block w-100" alt="Success 1">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-two.jpeg') !!}" class="d-block w-100" alt="Success 2">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-three.jpeg') !!}" class="d-block w-100" alt="Success 3">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-four.jpeg') !!}" class="d-block w-100" alt="Success 4">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-five.jpeg') !!}" class="d-block w-100" alt="Success 5">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-six.jpeg') !!}" class="d-block w-100" alt="Success 6">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-seven.jpg') !!}" class="d-block w-100" alt="Success 4">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-eight.jpg') !!}" class="d-block w-100" alt="Success 5">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-nine.jpeg') !!}" class="d-block w-100" alt="Success 6">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-ten.jpeg') !!}" class="d-block w-100" alt="Success 4">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-eleven.jpeg') !!}" class="d-block w-100" alt="Success 5">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <!-- <div class="col-md-4 image-container">
                                <img src="{!! asset('assets/frontend1/images/success-six.jpeg') !!}" class="d-block w-100" alt="Success 6">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev custom-control" href="#imageCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next custom-control" href="#imageCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="mb-5 pb-5">
        <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-4">
                <div class="section-title mb-4 text-center text-xl-left">
                    <h2>Trusted by students & parents from</h2>
                </div>
                <div class="trusted-schools">
                    <figure>
                        <img src="{!! asset('assets/frontend1/images/parent-school/Jamnabai-Narsee-International-School-Mumbai.png') !!}" alt="image">
                    </figure>
                    <figure>
                        <img src="{!! asset('assets/frontend1/images/parent-school/Utpal.jpeg') !!}" alt="image">
                    </figure>
                    <figure>
                        <img src="{!! asset('assets/frontend1/images/parent-school/oberoi.png') !!}" alt="image">
                    </figure>
                    <figure>
                        <img src="{!! asset('assets/frontend1/images/parent-school/uwscea.jpeg') !!}" alt="image">
                    </figure>
                    <figure>
                        <img src="{!! asset('assets/frontend1/images/parent-school/nps.png') !!}" alt="image">
                    </figure>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="owl-carousel owl-theme owl-video-Slide" id="kids">
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent11.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent13.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent16.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent14.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent17.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent15.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent3.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent3.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent4.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent4.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent8.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent8.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent5.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent5.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent6.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent6.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent7.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent7.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>

                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent12.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent12.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>

                    <div class="video-click">
                        <video controls="" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent1.jpg') !!}" width="100%" onclick="this.play();">
                            <source src="{!! asset('assets/frontend1/video/parent1.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent2.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent2.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent9.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent9.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('assets/frontend1/video/parent10.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('assets/frontend1/video/parent10.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                </div>
            </div>
        </div>
            
        </div>
    </section>

    {{--<section class="great-sec">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2>Bambinos focuses on 4 pillars of communication</h2>
            </div>
            <div class="row great-row text-center">
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="great-icon">
                        <img class="lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/great-1.png') !!}" alt="icon">
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="great-icon mt-3">
                        <img class="lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/great-2.png') !!}" alt="icon">
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="great-icon">
                        <img class="lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/great-3-1.png') !!}" alt="icon">
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="great-icon mt-3">
                        <img class="lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/great-4.png') !!}" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    {{-- <section class="why-bambinos pb-5 mb-5 pt-0 pt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="why-figure">
                        <figure>
                            <img class="img-fluid lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/why-bambinos.png') !!}" alt="bambinos">
                        </figure>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="section-title mb-4">
                        <h2>Why bambinos</h2>
                    </div>
                    <ul class="step step-dashed mb-3">
                        <li class="step-item">
                          <div class="step-content-wrapper">
                            <span class="step-icon">1</span>
                            <div class="step-content">
                              <h5 class="step-title">Industry-leading documentation</h5>
                              <p><a class="link" href="./documentation/index.html">Our documentation</a> and extensive Client libraries contain everything a business needs to build a custom integration in a fraction of the time.</p>
                            </div>
                          </div>
                        </li>
                        <li class="step-item">
                            <div class="step-content-wrapper">
                              <span class="step-icon">2</span>
                              <div class="step-content">
                                <h5 class="step-title">Industry-leading documentation</h5>
                                <p>Eextensive Client libraries contain everything a business needs to build a custom integration in a fraction of the time.</p>
                              </div>
                            </div>
                          </li>
                        <li class="step-item mb-0">
                          <div class="step-content-wrapper">
                            <span class="step-icon">3</span>
                            <div class="step-content">
                              <h5 class="step-title">Support for the developer community</h5>
                              <p class="mb-0">We actively contribute to open-source projects—giving back to the community through development, patches, and sponsorships.</p>
                            </div>
                          </div>
                        </li>
                    </ul>
                    @if(Auth::guard('parent')->user())
                        <button type="button" class="btn btn-round btn-warning text-uppercase mt-4" data-toggle="modal" data-target="#demoModal">
                        Book a free Class
                        </button>
                    @else
                        <button type="button" class="btn btn-round btn-warning text-uppercase mt-4 open_book_demo">Book a free Class</button>
                    @endif 
                </div>
            </div>
        </div>
    </section> --}}
    

    <section class="unleash-sec">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="section-title mb-4">
                        <h2>Unleash the Inner Leader in Your Child</h2>
                    </div>
                        
                    <p>Enroll your child in a unique ‘Young Leaders Communicators’ Program</p>
                    @if(Auth::guard('parent')->user())
                        <button type="button" class="btn btn-round btn-light text-uppercase mt-4" data-toggle="modal" data-target="#demoModal">
                        Book a free Class
                        </button>
                    @else
                        <button type="button" class="btn btn-round btn-light text-uppercase mt-4 open_book_demo">Book a free Class</button>
                    @endif   
                </div>
            </div>
        </div>
        
        <div class="unleash-right"></div>
    </section>

    {{-- <section class="straight-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="straight-flex">
                        <figure><img class="img-fluid lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/straight-1.png') !!}"></figure>
                        <figcaption>
                            <h4>L - Learn</h4>
                            <article>Discover and strengthen your abilities to the fullest.</article>
                        </figcaption>
                    </div>
                    <div class="straight-flex">
                        <figure><img class="img-fluid lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/straight-2.png') !!}"></figure>
                        <figcaption>
                            <h4>E - Envision</h4>
                            <article>Gather knowledge and skills to pave the path to success.</article>
                        </figcaption>
                    </div>
                    <div class="straight-flex">
                        <figure><img class="img-fluid lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/straight-3.png') !!}"></figure>
                        <figcaption>
                            <h4>A - Accomplish</h4>
                            <article>Master the expertise to achieve the extraordinary.</article>
                        </figcaption>
                    </div>
                    <div class="straight-flex">
                        <figure><img class="img-fluid lazy" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="{!! asset('assets/frontend1/images/straight-4.png') !!}"></figure>
                        <figcaption>
                            <h4>D - Drive</h4>
                            <article>Drive yourself and others to succeed.</article>
                        </figcaption>
                    </div>
                </div>
            </div>
        </div>
        
    </section> --}}

    <section class="testibg">
        <div class="container-fluid">
            <div class="section-title text-center mb-5">
                <h4>Happy Parents</h4>
                <h2>What Parents are saying About Us</h2>
                <div class="rating mt-3 mb-1">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div>
                    <a href="https://search.google.com/local/reviews?placeid=ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" title="Check All Reviews" rel="noopener">
                        <img src="{!! asset('assets/frontend1/images/bambinos_google_logo.png') !!}" style="height:40px;" alt="bambinos.live Reviews">
                    </a>
                    <div class="mt-1" style="color:#000;">
                        <div>
                            <span itemprop="name">bambinos.live <a href="https://search.google.com/local/reviews?placeid=ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" title="Check All Reviews" rel="noopener"> Reviews</a></span>
                        </div>
                    </div>
                </div>
                <!-- <h5 class="text-muted mt-2">from {{ CustomHelper::getreviewcount() }} reviews</h5> -->
            </div>

        

            <div class="owl-carousel owl-theme " id="testi">
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/113367149706794604573/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GiwqnklgBn2V4hUnK7_Jg3WTcwlO_9WgAM7O5M6qw=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>preeti s</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Fantastic platform for learning phonics, reading, and speaking skills as well as life skills for  children. Beyond the traditional structure, approach topics in fun and engaging ways to involve children while still meeting learning … <a href="https://www.google.com/maps/contrib/113367149706794604573/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/113367149706794604573/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/107753894686077273933/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GgmjGSLY71WxFVzZ_WKScRkjpe_6HF2tziY-2UcMw=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>sreeja dath</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>It has been 3 months Ishan is learning from Aparna Mam and it has been a great experience. She is highly enthusiastic possess high energy, she induce the same energy and enthusiasm in to kids and their thoughts. These characteristics makes … <a href="https://www.google.com/maps/contrib/107753894686077273933/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/113367149706794604573/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://goo.gl/maps/dCyhdJokDJBaShCm8" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GgYhfn6RCoPFV5ef3-LH9fWZ3gTvE_FaNieJ4R5XAc=w75-h75-p-rp-mo-ba3-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Raj Navitha</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Happy we choose Bambinos<br>There are so many people doing this online.<br>But the quality of the class is very excellent. My daughter enjoy the class very well. She loves her mentor Shruti mam. Ma'am is always caring ,lovable person … <a href="https://goo.gl/maps/dCyhdJokDJBaShCm8" target="_blank">Read More</a></p>
                        <a href="https://goo.gl/maps/dCyhdJokDJBaShCm8" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div> --}}
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/117144014090309310613/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14Ghiw2TykiOCpOeD2Ki64xX0-tUriRH6bClYeFnQ8A=s240-c-c0x00000000-cc-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>anju jalan</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Wonderful experience with bambinos ..Vidya ma'am is an amazing teacher..The teaching method and the way she explains is excellent..As my child has completed just a few classes,I hope to see good results..</p>
                        <a href="https://www.google.com/maps/contrib/117144014090309310613/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://g.co/kgs/2hELHZ" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a/AATXAJzmEcBbdq4MLPg3d-CfNGv7CQyYVSYyBVCv0HtI=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3 style="direction:rtl">أبو غسان ِAbdullah Alsulaimi</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Ritu is a great  skilled teacher. I can see the result of her proficienal teaching in my son Ghassan as he improved with her very fast. She can enrich his vocabularies and promote his understanding using different methods of … <a href="https://g.co/kgs/2hELHZ" target="_blank">Read More</a></p>
                        <a href="https://g.co/kgs/2hELHZ" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/108116296446641081830/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GjFsxvpDaP5hro1NUOPZAyMJeG7W-72bL6M5qZZ=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Nafiz Hossain</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>The experience was excellent till now.....She enjoys it a lot So far the classes are great. She likes you a lot. You make her understand, you give her space and chance to deliver even something she not get the things at the first step. She loves … <a href="https://www.google.com/maps/contrib/108116296446641081830/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/108116296446641081830/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/106151561141154188757/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GgFDMu0QNF3Wh28ReppRbx89rWVLcyu5HZJcQGcmQ=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>AGP</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Sueallen has been great and patient with my 5-year-old who is easily distracted. We like how she wraps up and recall the material at the end of each session. To maximize the session, session may include be more kindergarten … <a href="https://www.google.com/maps/contrib/106151561141154188757/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/106151561141154188757/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/118253098898209280206/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GjTTwk_QpZLNPA_i1nDz73IH22Xc0N5CAADIvDq=s240-c-c0x00000000-cc-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Priyanka Gattamaneni</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Hiii.... my son took session from Bambino.. it was very nice platform to enhance our kids communication skills.. Anindita Chakraborty was .doing vey good..  my son enjoys a lot with her class.. before he was very dull … <a href="https://www.google.com/maps/contrib/118253098898209280206/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/118253098898209280206/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/104773466885964228818/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14Gh9BgKCvuzEtMSypL72Rd09aZE7wJz6G_hIgWq4Hg=w45-h45-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>shruti jayaram</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>I am totally recommending Bambinos My child who was shy and wouldn't speak has started interacting in school and has started forming sentences. Thanks a lot Sonam Maam for your patience and teaching … <a href="https://www.google.com/maps/contrib/104773466885964228818/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/104773466885964228818/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/114496406844655743343/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a/AATXAJw3tJDFdOWDcVO4Ypelld4jTOFn-3VTavm4_w-i=s240-c-c0x00000000-cc-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Ganesha Rasangi</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Thank you for the support and guidance given to Binev, I can see his developments and he actively participated for all the lessons. Even he really enjoyed by doing homework specially he was inspired by the feedbacks given by the teacher … <a href="https://www.google.com/maps/contrib/114496406844655743343/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/114496406844655743343/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                 <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/116976779958165471083/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GjL2cnE2Kw_cr8MnqfyPvNXKnNrKyRymv6lxubSVg=s240-c-c0x00000000-cc-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Syeeda Jahan</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>My daughter have been learning at Bambinos from Ms Manjusha since last 4 month and it has been a great experience for my daughter as well as for me as a parent . Her process of teaching, patient & manner is so wonderful and understanding … <a href="https://www.google.com/maps/contrib/116976779958165471083/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/116976779958165471083/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/103563985857260722080/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a/AATXAJxA-Tg4GshILeTXh3picxlLG9FJCrX7i6ungf_j=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Rishu s</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Very good experience with the classes.It has been only a month ever since my child joined 'Phonics: Young Readers Program' offered by Bambinos and She has already started showing great change in her reading and writing skills. I would like to thank her teacher … <a href="https://www.google.com/maps/contrib/103563985857260722080/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">Read More</a></p>
                        <a href="https://www.google.com/maps/contrib/103563985857260722080/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://www.google.com/maps/contrib/109097687456190999915/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14Gh_Eqt561zaGuVA4LKSQgqXGWgxmBbEte4niu8zKeQ=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>madhulatha varala (Madhu Varala)</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>Hello,Happy to share that my kid has improved alot with this classes and the instructor and the curriculum you are following  improved the reading skills of my child. Thank you bambinos</p>
                        <a href="https://www.google.com/maps/contrib/109097687456190999915/place/ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://g.co/kgs/tbCGa5" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GiJ87XCWkCKDiSvqWKenT7pZOx3vFg1GoxmBo8Qmw=w75-h75-p-rp-mo-ba3-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Vikram Rao</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>We have had a wonderful experience with bambinos, the teacher allocated to us was Alisha and my daughter would absolutely look forward to her classes because they would be engaging , interactive with lots of learning!! … <a href="https://g.co/kgs/tbCGa5" target="_blank">Read More</a></p>
                        <a href="https://g.co/kgs/tbCGa5" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://g.co/kgs/KLR2jf" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14Gg8qTFm6uZo6HPRAn6vcJT4soUmxiETFc4ATzcm_Q=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Azri Hamdhy Hassen</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>My daughter have been learning at Bambinos from Ms. Sugritha & Ms. Sangeetha since last 3 months and it has been a great experience for my daughter as well as for me as a Parent. Their manner of teaching is so wonderful and refreshing!! … <a href="https://g.co/kgs/KLR2jf" target="_blank">Read More</a></p>
                        <a href="https://g.co/kgs/KLR2jf" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <a href="https://g.co/kgs/iZ6yLT" target="_blank">
                            <div class="review-owner-photo">
                                <img class="lazy fluid" src="{!! asset('assets/frontend/images/bambinosb.jpg') !!}" data-src="https://lh3.googleusercontent.com/a-/AOh14GjDO233JgW6cbWYYA1697Vh8Srx4SJwoqkJE5NI-w=w75-h75-p-rp-mo-br100">
                            </div>
                            <div class="review-owner">
                                <h3>Ankita Garg</h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </a>
                        <p>This review is especially for my daughter's Sharpen the Axe teacher, Aparna Sharma. I don't think we have ever found a teacher who is as enthusiastic, motivating and loving towards her kids! She instills this amazing confidence in them … <a href="https://g.co/kgs/iZ6yLT" target="_blank">Read More</a></p>
                        <a href="https://g.co/kgs/iZ6yLT" target="_blank" class="d-flex justify-content-start align-items-center">
                            <div><img src="{!! asset('assets/frontend1/images/google.svg') !!}" height="39"></div>
                            <div class="posted_on ml-2">
                                <small class="text-muted">Posted on</small>
                                <div>Google</div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                {{--<div class="review-card">
                    <div class="review-card-top">
                        <p>We have enrolled our son in Handwriting class and are very happy with his teacher Guddi. She is very passionate and has excellent teaching skills. As promised she has instilled interest in writing to our son. She is very patient and friendly ensuring his complete focus all through the session. We are very happy for our decision to enroll our son in this class with Guddi.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="review-card-bottom">
                        <h3>Raamsudhakar</h3>
                        <h5>Hyderabad, India</h5>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <p>It was an enriching experience to improve the child's scientific temper. Ms Krithika was extremely patient with the kids and explained the concepts in ways that were easily understood.It was a perfect blend of learning and playing. Kudos to the entire team for delivering  this program in such a well organised manner.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                    <div class="review-card-bottom">
                        <h3>Lisa Parker</h3>
                        <h5>Seoul, Korea</h5>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <p>The method of teaching and care was wonderful at Handwriting class conducted by Guddi Ma'am. I thanks entire Bambinos team for bringing such quality program for kids during this pandemic time.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                    <div class="review-card-bottom">
                        <h3>Niti Goyal</h3>
                        <h5>Dubai, U.A.E.</h5>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <p>Really good teacher padmja mam, and also akansha mam. Great learning so far. Thanks team bambinos for this amazing class. </p>
                    
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                    <div class="review-card-bottom">
                        <h3>Gayatri Gikshit</h3>
                        <h5>Kathmandu, Nepal</h5>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-top">
                        <p>I have never seen mallank so happy to be a part of any academic learning. He looks forward to be in english class and finishes all his assignments in jiffy. All this because of Aparna miss is Fab!! Thank you, Aparna & team bambinos for making learning so fun!!</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                    <div class="review-card-bottom">
                        <h3>Neha Mittal</h3>
                        <h5>Delhi, India</h5>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>

    <section class="join-steps">
        <div class="container">
            <div class="section-title text-center pb-5 mb-0 mb-md-4">
                <h2>Join the group of 10,000+ parents and<br>give your child the Bambinos edge</h2>
            </div>
        </div>
        <div class="join-steps-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-12">
                        <div class="owl-carousel owl-theme" id="stepSlide">
                            <div class="step-card">
                                <h3>Step 1</h3>
                                <p>Book a free demo class</p>
                            </div>
                            <div class="step-card">
                                <h3>Step 2</h3>
                                <p>Get the assignment and level</p>
                            </div>
                            <div class="step-card">
                                <h3>Step 3</h3>
                                <p>Start your learning journey</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    {{-- <section class="accordion-faq">
        <div class="container">
            <div class="section-title text-center mb-4 mb-md-5">
                <h2>Questions often asked</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <article>
                        <h4 class="">
                            What can I discover on Bambinos online classes page?
                            <i class="fa fa-angle-up"></i>
                        </h4>
                        <div style="display: none;"> 
                            Bambinos addresses the growing needs of kids between 3-15 years of the age group for various after-school classes, including enrichment programs, tutoring, activities, hobbies, and many more. We have classes across multiple categories to help your little one to learn at home and stay busy.
                        </div>
                    </article>
                    <article>
                        <h4 class="">
                            How do online classes work?
                            <i class="fa fa-angle-up"></i>
                        </h4>
                        <div style="display: none;"> 
                            All our classes are conducted live where students can interact with the educators and peers in real-time, and boost their growth.
                        </div>
                    </article>
                    <article>
                        <h4 class="">
                            How do I join the platform?
                            <i class="fa fa-angle-up"></i>
                        </h4>
                        <div style="display: none;"> 
                            To join the platform, you need to create an account. Click on the login button on the top right and register as a member. Select a class, add a child and book a class (first two classes are free).
                        </div>
                    </article>
                    <article>
                        <h4 class="">
                            How do you ensure quality of classes?
                            <i class="fa fa-angle-up"></i>
                        </h4>
                        <div style="display: none;"> 
                            Our educators go through a complete background check and a review of their past experiences, learning pedagogies and study material. We ensure that your child gets the best learning.
                        </div>
                    </article>
                    <article>
                        <h4 class="">
                            Can I cancel my classes once booked?
                            <i class="fa fa-angle-up"></i>
                        </h4>
                        <div style="display: none;"> 
                            Yes, you can cancel any class you have booked 4 hours before class start time.
                        </div>
                    </article>
                </div>
                <div class="col-md-10 col-12 text-center mt-5">
                    @if(Auth::guard('parent')->user())
                        <button type="button" class="btn btn-round btn-warning text-uppercase mt-4" data-toggle="modal" data-target="#demoModal">
                            Book A Free Class
                        </button>
                    @else
                        <button type="button" class="btn btn-round btn-warning text-uppercase mt-4 open_book_demo">Book A Free Class</button>
                    @endif 
                </div>
            </div>
        </div>
    </section> --}}
    <div style="position: fixed; right: 20px; bottom: 20px; z-index: 1000;">
        <a href="https://wa.me/919403890176?text=Hi!,%20I'm%20interested%20in%20the%20course" target="_blank" style="pointer-events: auto; cursor: pointer; position: relative;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width: 70px; height: 70px;">
        </a>
    </div>

    @include('includes.frontend1.footer')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal"  role="dialog">
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
    <script src="//rum-static.pingdom.net/pa-66ca84bb36b5cc0012000056.js" async></script>
    {{--<script src="{!! asset('assets/frontend1/js/parallax.min.js') !!}"></script>
    <script src="{!! asset('assets/frontend1/js/parallax-video.min.js') !!}"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.10.0/rellax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    {{--<script src="{!! asset('assets/frontend1/js/confetti.js') !!}"></script>--}}
  
    @if(session('email_verified'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Email Verified!',
                text: 'Your email has been successfully verified.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                showCancelButton: true,
                cancelButtonText: 'Go to Dashboard',
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "OK" button
                    // Handle any additional action if needed
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "Go to Dashboard" button
                    window.location.href = "{{ route('parent.dashboard') }}"; // Replace with actual route
                }
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const snowContainer = document.querySelector('.snow-container');
    const snowflakesCount = 200; // Set a fixed number of snowflakes

    for (let i = 0; i < snowflakesCount; i++) {
        const snowflake = document.createElement('div');
        snowflake.classList.add('snowflake');

        // Random horizontal position
        snowflake.style.left = `${Math.random() * 100}%`;

        // Random size
        const size = `${Math.random() * 5 + 5}px`; // size between 5px and 10px
        snowflake.style.width = size;
        snowflake.style.height = size;

        // Random animation duration and delay
        snowflake.style.animationDuration = `${Math.random() * 5 + 5}s`;
        snowflake.style.animationDelay = `${Math.random() * 5}s`;

        // Randomize the horizontal movement
        snowflake.style.setProperty('--random-x', Math.random());

        // Randomize opacity to create different shades of white
        const opacity = Math.random() * 0.5 + 0.5; // between 0.5 and 1
        snowflake.style.opacity = opacity;
        snowflake.style.boxShadow = `0 0 20px 5px rgba(255, 255, 255, ${opacity * 0.7})`; // Corresponding glow opacity

        // Append snowflake to container
        snowContainer.appendChild(snowflake);
    }
});
    </script>

    <script>
        
        var rellax = new Rellax('.rellax');

        $('#kids').owlCarousel({
            items: 3,
            loop: false,
            margin: 25,
            //stagePadding: 55,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            autoplay: false,
            autoplayTimeout: 2200,
            autoplaySpeed: 2500,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                1200: {
                    items: 3
                },
                992: {
                    items: 4
                },
                768: {
                    items: 3
                },
                480: {
                    items: 2
                },
                0: {
                    items: 1,
                    margin: 25,
                    stagePadding: 55,
                    nav: false,
                    autoplay: false
                }
            }

        });
        $('#testi').owlCarousel({
            items: 4,
            loop: true,
            margin: 45,
            stagePadding: 0,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            autoplay: false,
            //autoplayTimeout: 2200,
            //autoplaySpeed: 2500,
            //autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                992: {
                    items: 3
                },

                768: {
                    items: 2
                },
                0: {
                    items: 1,
                    margin: 25,
                    stagePadding: 0
                }
            }
        });

        jQuery(document).ready(function($) {
            var carousel = $("#stepSlide");
            carousel.owlCarousel({
                loop : false,
                items : 3,
                margin:0,
                nav : true,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                dots : false,
                responsiveClass: true,
                responsive: {
                    992: {
                        items: 3
                    },

                    768: {
                        items: 1
                    },

                    0: {
                        items: 1
                    }
                }
            });
            checkClasses();
            carousel.on('translated.owl.carousel', function(event) {
                checkClasses();
            });
            function checkClasses(){
                if($(window).width() > 768){
                var total = $('#stepSlide .owl-stage .owl-item.active').length;
                
                    $('#stepSlide .owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');

                    $('#stepSlide .owl-stage .owl-item.active').each(function(index){
                        if (index === 0) {
                            // this is the first one
                            $(this).addClass('firstActiveItem');
                        }
                        if (index === total - 1 && total>1) {
                            // this is the last one
                            $(this).addClass('lastActiveItem');
                        }
                    });
                }
            }
        });

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

        $('.video-click video').on('play', function(e) {
            $('.video-click video').not(this).each(function() {
                this.pause()
            })
        });

        // function watchVideo()
        // {
        //     $(".newsletter").fadeIn();
        //     $('#ytvideo').attr('src', 'https://www.youtube.com/embed/ceA9UOzgasQ');
        // }
        // function videoClose()
        // {
        //     $(".newsletter").fadeOut();
        //     $('#ytvideo').attr('src', '');
        // }

        // $(window).on('scroll', function() {
        //     if ($(this).scrollTop() > 70) {
        //         $('header').fadeIn();
        //     } else {
        //         $('header').hide();
        //     }
        // });

    </script>
    <script>

        /*
           * Light YouTube Embeds by @labnol
           * Credit: https://www.labnol.org/
           */

        function labnolIframe(div) {
            var iframe = document.createElement('iframe');
            iframe.setAttribute(
                'src',
                'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0'
            );
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allowfullscreen', '1');
            iframe.setAttribute(
                'allow',
                'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
            );
            div.parentNode.replaceChild(iframe, div);
        }

        function initYouTubeVideos() {
            var playerElements = document.getElementsByClassName('youtube-player');
            for (var n = 0; n < playerElements.length; n++) {
                var videoId = playerElements[n].dataset.id;
                var div = document.createElement('div');
                div.setAttribute('data-id', videoId);
                var thumbNode = document.createElement('img');
                thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace(
                    'ID',
                    videoId
                );
                div.appendChild(thumbNode);
                var playButton = document.createElement('div');
                playButton.setAttribute('class', 'play');
                div.appendChild(playButton);
                div.onclick = function () {
                    labnolIframe(this);
                };
                playerElements[n].appendChild(div);
            }
        }

        document.addEventListener('DOMContentLoaded', initYouTubeVideos);
    </script>

    <script>
        $('#imageCarousel').on('slide.bs.carousel', function (e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 3;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    } else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });
    </script>
    <script>

        // const btnConfetti = document.getElementById("confetti-btn");

        //     let status = true;
        //     let particlesContainer;
        //     let particlesOptions;

        //     btnConfetti.addEventListener("click", function () {
        //     toggleStatus(!status);
        //     });

        //     function toggleStatus(newStatus) {
        //     status = newStatus;

        //     if (status) {
        //         tsParticles.load(particlesOptions).then((container) => {
        //         particlesContainer = container;

        //         document.querySelector(".fa-play").classList.add("hidden");
        //         document.querySelector(".fa-pause").classList.remove("hidden");
        //         });
        //     } else {
        //         if (particlesContainer) {
        //         particlesContainer.destroy();
        //         particlesContainer = undefined;

        //         document.querySelector(".fa-play").classList.remove("hidden");
        //         document.querySelector(".fa-pause").classList.add("hidden");
        //         }
        //     }
        //     }

        //     document.addEventListener("DOMContentLoaded", function () {
        //     particlesOptions = {
        //         fpsLimit: 20,
        //         particles: {
        //         number: {
        //             value: 0
        //         },
        //         color: {
        //             value: "#f00"
        //         },
        //         shape: {
        //             type: ["circle", "square", "polygon"],
        //             options: {
        //             polygon: {
        //                 sides: 6
        //             }
        //             }
        //         },
        //         opacity: {
        //             value: { min: 0, max: 1 },
        //             animation: {
        //             enable: true,
        //             speed: 1,
        //             startValue: "max",
        //             destroy: "min"
        //             }
        //         },
        //         size: {
        //             value: { min: 1, max: 4 }
        //         },
        //         life: {
        //             duration: {
        //             sync: true,
        //             value: 4
        //             },
        //             count: 1
        //         },
        //         move: {
        //             enable: true,
        //             gravity: {
        //             enable: true
        //             },
        //             drift: {
        //             min: -2,
        //             max: 2
        //             },
        //             speed: { min: 10, max: 30 },
        //             decay: 0.1,
        //             direction: "none",
        //             random: false,
        //             straight: false,
        //             outModes: {
        //             default: "destroy",
        //             top: "none"
        //             }
        //         },
        //         rotate: {
        //             value: {
        //             min: 0,
        //             max: 360
        //             },
        //             direction: "random",
        //             move: true,
        //             animation: {
        //             enable: true,
        //             speed: 60
        //             }
        //         },
        //         tilt: {
        //             direction: "random",
        //             enable: true,
        //             move: true,
        //             value: {
        //             min: 0,
        //             max: 360
        //             },
        //             animation: {
        //             enable: true,
        //             speed: 60
        //             }
        //         },
        //         roll: {
        //             darken: {
        //             enable: true,
        //             value: 25
        //             },
        //             enable: true,
        //             speed: {
        //             min: 15,
        //             max: 25
        //             }
        //         },
        //         wobble: {
        //             distance: 30,
        //             enable: true,
        //             move: true,
        //             speed: {
        //             min: -15,
        //             max: 15
        //             }
        //         }
        //         },
        //         detectRetina: true,
        //         emitters: {
        //         direction: "none",
        //         spawnColor: {
        //             value: "#ff0000",
        //             animation: {
        //             h: {
        //                 enable: true,
        //                 offset: {
        //                 min: -1.4,
        //                 max: 1.4
        //                 },
        //                 speed: 0.1,
        //                 sync: false
        //             },
        //             l: {
        //                 enable: true,
        //                 offset: {
        //                 min: 20,
        //                 max: 80
        //                 },
        //                 speed: 0,
        //                 sync: false
        //             }
        //             }
        //         },
        //         life: {
        //             count: 0,
        //             duration: 0.2,
        //             delay: 0.6
        //         },
        //         rate: {
        //             delay: 0.1,
        //             quantity: 50
        //         },
        //         size: {
        //             width: 0,
        //             height: 0
        //         }
        //         }
        //     };

        //     toggleStatus(status);
        // });

        
    </script>


       <script>
        // window.addEventListener("resize", resizeCanvas, false);
        // window.addEventListener("DOMContentLoaded", onLoad, false);
        
        // window.requestAnimationFrame = 
        //     window.requestAnimationFrame       || 
        //     window.webkitRequestAnimationFrame || 
        //     window.mozRequestAnimationFrame    || 
        //     window.oRequestAnimationFrame      || 
        //     window.msRequestAnimationFrame     || 
        //     function (callback) {
        //         window.setTimeout(callback, 1000/60);
        //     };
        
        // var canvas, ctx, w, h, particles = [], probability = 0.04,
        //     xPoint, yPoint;
        
        // function onLoad() {
        //     canvas = document.getElementById("wcanvas");
        //     ctx = canvas.getContext("2d");
        //     resizeCanvas();
            
        //     window.requestAnimationFrame(updateWorld);
        // } 
        
        // function resizeCanvas() {
        //     if (!!canvas) {
        //         w = canvas.width = window.innerWidth;
        //         h = canvas.height = window.innerHeight;
        //     }
        // } 
        
        // function updateWorld() {
        //     update();
        //     paint();
        //     window.requestAnimationFrame(updateWorld);
        // } 
        
        // function update() {
        //     if (particles.length < 500 && Math.random() < probability) {
        //         createFirework();
        //     }
        //     var alive = [];
        //     for (var i=0; i<particles.length; i++) {
        //         if (particles[i].move()) {
        //             alive.push(particles[i]);
        //         }
        //     }
        //     particles = alive;
        // } 
        
        // function paint() {
        //     ctx.globalCompositeOperation = 'source-over';
        //     ctx.fillStyle = "#fff";
        //     ctx.fillRect(0, 0, w, h);
        //     ctx.globalCompositeOperation = 'darker';
        //     for (var i=0; i<particles.length; i++) {
        //         particles[i].draw(ctx);
        //     }
        // } 
        
        // function createFirework() {
        //     xPoint = Math.random()*(w-200)+100;
        //     yPoint = Math.random()*(h-200)+100;
        //     var nFire = Math.random()*50+100;
        //     var c = "rgb("+(~~(Math.random()*200+55))+","
        //          +(~~(Math.random()*200+55))+","+(~~(Math.random()*200+55))+")";
        //     for (var i=0; i<nFire; i++) {
        //         var particle = new Particle();
        //         particle.color = c;
        //         var vy = Math.sqrt(25-particle.vx*particle.vx);
        //         if (Math.abs(particle.vy) > vy) {
        //             particle.vy = particle.vy>0 ? vy: -vy;
        //         }
        //         particles.push(particle);
        //     }
        // } 
        
        // function Particle() {
        //     this.w = this.h = Math.random()*4+1;
            
        //     this.x = xPoint-this.w/2;
        //     this.y = yPoint-this.h/2;
            
        //     this.vx = (Math.random()-0.5)*10;
        //     this.vy = (Math.random()-0.5)*10;
            
        //     this.alpha = Math.random()*.5+.5;
            
        //     this.color;
        // } 
        
        // Particle.prototype = {
        //     gravity: 0.05,
        //     move: function () {
        //         this.x += this.vx;
        //         this.vy += this.gravity;
        //         this.y += this.vy;
        //         this.alpha -= 0.01;
        //         if (this.x <= -this.w || this.x >= screen.width ||
        //             this.y >= screen.height ||
        //             this.alpha <= 0) {
        //                 return false;
        //         }
        //         return true;
        //     },
        //     draw: function (c) {
        //         c.save();
        //         c.beginPath();
                
        //         c.translate(this.x+this.w/2, this.y+this.h/2);
        //         c.arc(0, 0, this.w, 0, Math.PI*2);
        //         c.fillStyle = this.color;
        //         c.globalAlpha = this.alpha;
                
        //         c.closePath();
        //         c.fill();
        //         c.restore();
        //     }
        // } 
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
@endsection
