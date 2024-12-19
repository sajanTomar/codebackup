@extends('layouts.signupnew')

@section('css')
    @include('includes.signupnew1.css')
    <link rel="stylesheet" href="{!! asset('public/assets/booking1/css/gita.css?v=2.4') !!}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
        img.lazy {
            display: block;
        }
        .form-control{
            background-color: transparent;
            color: #3777ff;
            padding: 0.675rem 0.75rem;
            height: 47px;
            font-size: 15px;
            border: 1px solid #3777ff;
        }
        .select2-container--default .select2-selection--single {
            border-radius: 4px;
            height: 47px;
            border: 1px solid #3777ff;
            background-color: transparent;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            /* color: #3777ff; */
            line-height: 45px;
            font-size: 15px;
            padding-left: 11px
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #3777ff transparent transparent transparent;
        }

        .select2-selection__clear {
            display: none
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 45px
        }

        .select2-results__option {
            font-size: 14px
        }
        .svg-check::before {
            position: absolute;
            right: 21px;
            top: 11px;
            width: 24px;
            height: 24px;
            background: #15cca0;
            content: '';
            -webkit-mask-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMjMuMzM0IDExLjk2Yy0uNzEzLS43MjYtLjg3Mi0xLjgyOS0uMzkzLTIuNzI3LjM0Mi0uNjQuMzY2LTEuNDAxLjA2NC0yLjA2Mi0uMzAxLS42Ni0uODkzLTEuMTQyLTEuNjAxLTEuMzAyLS45OTEtLjIyNS0xLjcyMi0xLjA2Ny0xLjgwMy0yLjA4MS0uMDU5LS43MjMtLjQ1MS0xLjM3OC0xLjA2Mi0xLjc3LS42MDktLjM5My0xLjM2Ny0uNDc4LTIuMDUtLjIyOS0uOTU2LjM0Ny0yLjAyNi4wMzItMi42NDItLjc3Ni0uNDQtLjU3Ni0xLjEyNC0uOTE1LTEuODUtLjkxNS0uNzI1IDAtMS40MDkuMzM5LTEuODQ5LjkxNS0uNjEzLjgwOS0xLjY4MyAxLjEyNC0yLjYzOS43NzctLjY4Mi0uMjQ4LTEuNDQtLjE2My0yLjA1LjIyOS0uNjEuMzkyLTEuMDAzIDEuMDQ3LTEuMDYxIDEuNzctLjA4MiAxLjAxNC0uODEyIDEuODU3LTEuODAzIDIuMDgxLS43MDguMTYtMS4zLjY0Mi0xLjYwMSAxLjMwMnMtLjI3NyAxLjQyMi4wNjUgMi4wNjFjLjQ3OS44OTcuMzIgMi4wMDEtLjM5MiAyLjcyNy0uNTA5LjUxNy0uNzQ3IDEuMjQyLS42NDQgMS45NnMuNTM2IDEuMzQ3IDEuMTcgMS43Yy44ODguNDk1IDEuMzUyIDEuNTEgMS4xNDQgMi41MDUtLjE0Ny43MS4wNDQgMS40NDguNTE5IDEuOTk2LjQ3Ni41NDkgMS4xOC44NDQgMS45MDIuNzk4IDEuMDE2LS4wNjMgMS45NTMuNTQgMi4zMTcgMS40ODkuMjU5LjY3OC44MiAxLjE5NSAxLjUxNyAxLjM5OS42OTUuMjA0IDEuNDQ3LjA3MiAyLjAzMS0uMzU3LjgxOS0uNjAzIDEuOTM2LS42MDMgMi43NTQgMCAuNTg0LjQzIDEuMzM2LjU2MiAyLjAzMS4zNTcuNjk3LS4yMDQgMS4yNTgtLjcyMiAxLjUxOC0xLjM5OS4zNjMtLjk0OSAxLjMwMS0xLjU1MyAyLjMxNi0xLjQ4OS43MjQuMDQ2IDEuNDI3LS4yNDkgMS45MDItLjc5OC40NzUtLjU0OC42NjctMS4yODYuNTE5LTEuOTk2LS4yMDctLjk5NS4yNTYtMi4wMSAxLjE0NS0yLjUwNS42MzMtLjM1NCAxLjA2NS0uOTgyIDEuMTY5LTEuN3MtLjEzNS0xLjQ0My0uNjQzLTEuOTZ6bS0xMi41ODQgNS40M2wtNC41LTQuMzY0IDEuODU3LTEuODU3IDIuNjQzIDIuNTA2IDUuNjQzLTUuNzg0IDEuODU3IDEuODU3LTcuNSA3LjY0MnoiLz48L3N2Zz4=);
            mask-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMjMuMzM0IDExLjk2Yy0uNzEzLS43MjYtLjg3Mi0xLjgyOS0uMzkzLTIuNzI3LjM0Mi0uNjQuMzY2LTEuNDAxLjA2NC0yLjA2Mi0uMzAxLS42Ni0uODkzLTEuMTQyLTEuNjAxLTEuMzAyLS45OTEtLjIyNS0xLjcyMi0xLjA2Ny0xLjgwMy0yLjA4MS0uMDU5LS43MjMtLjQ1MS0xLjM3OC0xLjA2Mi0xLjc3LS42MDktLjM5My0xLjM2Ny0uNDc4LTIuMDUtLjIyOS0uOTU2LjM0Ny0yLjAyNi4wMzItMi42NDItLjc3Ni0uNDQtLjU3Ni0xLjEyNC0uOTE1LTEuODUtLjkxNS0uNzI1IDAtMS40MDkuMzM5LTEuODQ5LjkxNS0uNjEzLjgwOS0xLjY4MyAxLjEyNC0yLjYzOS43NzctLjY4Mi0uMjQ4LTEuNDQtLjE2My0yLjA1LjIyOS0uNjEuMzkyLTEuMDAzIDEuMDQ3LTEuMDYxIDEuNzctLjA4MiAxLjAxNC0uODEyIDEuODU3LTEuODAzIDIuMDgxLS43MDguMTYtMS4zLjY0Mi0xLjYwMSAxLjMwMnMtLjI3NyAxLjQyMi4wNjUgMi4wNjFjLjQ3OS44OTcuMzIgMi4wMDEtLjM5MiAyLjcyNy0uNTA5LjUxNy0uNzQ3IDEuMjQyLS42NDQgMS45NnMuNTM2IDEuMzQ3IDEuMTcgMS43Yy44ODguNDk1IDEuMzUyIDEuNTEgMS4xNDQgMi41MDUtLjE0Ny43MS4wNDQgMS40NDguNTE5IDEuOTk2LjQ3Ni41NDkgMS4xOC44NDQgMS45MDIuNzk4IDEuMDE2LS4wNjMgMS45NTMuNTQgMi4zMTcgMS40ODkuMjU5LjY3OC44MiAxLjE5NSAxLjUxNyAxLjM5OS42OTUuMjA0IDEuNDQ3LjA3MiAyLjAzMS0uMzU3LjgxOS0uNjAzIDEuOTM2LS42MDMgMi43NTQgMCAuNTg0LjQzIDEuMzM2LjU2MiAyLjAzMS4zNTcuNjk3LS4yMDQgMS4yNTgtLjcyMiAxLjUxOC0xLjM5OS4zNjMtLjk0OSAxLjMwMS0xLjU1MyAyLjMxNi0xLjQ4OS43MjQuMDQ2IDEuNDI3LS4yNDkgMS45MDItLjc5OC40NzUtLjU0OC42NjctMS4yODYuNTE5LTEuOTk2LS4yMDctLjk5NS4yNTYtMi4wMSAxLjE0NS0yLjUwNS42MzMtLjM1NCAxLjA2NS0uOTgyIDEuMTY5LTEuN3MtLjEzNS0xLjQ0My0uNjQzLTEuOTZ6bS0xMi41ODQgNS40M2wtNC41LTQuMzY0IDEuODU3LTEuODU3IDIuNjQzIDIuNTA2IDUuNjQzLTUuNzg0IDEuODU3IDEuODU3LTcuNSA3LjY0MnoiLz48L3N2Zz4=)
        }
        .svg-check
        {
            display:none;
        }
        /*.bottom-bar{
            display: none;
        }*/
        .header-strip{
            background: #fee155;
        }
        .header-strip img{
            height: 44px
        }
        .header-strip span{
            font-weight: 500;
            font-size: 18px;
        }
        .header-strip .btn{
            padding: 8px 23px;
            font-weight: 600;
            font-size: 78%;
        }
        .errormessage
        {
            font-size:12px;
        }
        .course-card {
            width: 100%;
            border-radius: 28px;
            padding: 30px 25px 30px;
            transition: all .3s ease;
            position: relative;
            min-height: 255px;
            background: #e8e8e8;
            box-shadow: 0 0px 40px 0 rgba(0,0,0,.04);
            text-align: center;
        }
        .course-card figure {
            border-radius: 4px;
            height: 220px;
            overflow: hidden;
        }
        .course-card figure img{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .course-card h3 {
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 20px;
            height: 52px
        }
        .course-card p {
            margin-top: 10px;
        }
        .course-card:hover {
            box-shadow: 0 0px 90px 0 rgb(0 0 0 / 7%);
            background: #fff;
        }
        @media screen and (max-width:768px) {
            .b24-widget-button-position-bottom-right {
                right: 10px!important;
                bottom: 130px!important;
            }
            .course-card h3 {
                height: auto
            }
        }
        .header-strip img{
            height: 34px
        }
        .header-strip span {
            font-weight: 500;
            font-size: 15px;
        }
    </style>
@endsection


@section('content')

<section class="gita-hero-sec">
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <div class="pr-lg-5 text-center">
                    <img class="yogi-logo" src="{!! asset('public/assets/frontend1/images/little-yogi-logo.png') !!}" alt="bambinos">
                  <h1 class="text-body mb-1">World’s first Bhagavad Gita course for Kids</h1>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-card">
                      <div class="heading-block text-center mb-5">
                          <h3>Book A Free Demo Class</h3>
                      </div>

                      <form action="{{ route('newdemobooking.send.otp') }}" method="POST" id="sendotp">
                        @include('newadsignup._partials.signupform')
                      </form>
                   
              </div>
          </div>
      </div>
  </div>
</section>



<section class="pt-5 mt-md-5">
  <div class="container">
      <div class="section-title text-center mb-4">
          <h2>Why is learning Gita important<br>for kids in today’s world?</h2>
      </div>
      <div class="row">
        
        <div class="col-12 col-lg-4 px-3 px-sm-4">
            <div class="industry-card">
               <div class="industry-card-icon">
                 <i class="uil uil-layer-group"></i>
               </div>
               <h4>Limited Awareness of Indian Culture</h4>
               <p>Gita is the best source to enrich cultural education</p>
            </div>
        </div>
          <div class="col-12 col-lg-4 px-3 px-sm-4">
              <div class="industry-card primary-card-light">
                 <div class="industry-card-icon">
                   <i class="uil uil-layer-group"></i>
                 </div>
                 <h4>Increased Pressure of School Life</h4>
                 <p>Gita helps children tackle school pressures: exam stress, peer pressure, bullying, competition</p>
              </div>
          </div>
          <div class="col-12 col-lg-4 px-3 px-sm-4">
              <div class="industry-card">
                 <div class="industry-card-icon">
                   <i class="uil uil-layer-group"></i>
                 </div>
                 <h4>Stress of Modern day Life</h4>
                 <p>Gita helps us handle everyday stress like social media pressure, rejections and relationship.</p>
              </div>
          </div>
      </div>
  </div>
</section>



<section id="home-ourworld" data-scroll="" class="is-inview">
  <div class="container">
      <div class="flex-container">
          <div class="left">
              <div class="images">
                  <div class="half-circle-container">
                      <div class="enter-img is-inview">
                          <div class="bg-img">
                            <img class="img-fluid" src="{!! asset('public/assets/frontend1/images/gita.gif') !!}" alt="img"/>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="right">
              <div class="text-container">
                  <div class="section-title mb-3">
                    <h2>Why learning Bhagavad Gita from Bambinos.live is 100% effective?</h2>
                    <span class="long-line"></span>
                  </div>
                  <div class="design-list">
                    <ul>
                        <li>Making Gita a Way of Life via real life application of Gita </li>
                        <li>Emphasis on cultural knowledge, moral values</li>
                        <li>Understanding and recitation of Shlokas</li>
                        <li>Engaging & kid-friendly curriculum</li>
                        <li>Taught by highly qualified, trained English speaking educators</li>
                    </ul>
                  </div>
            </div>
              <button type="button" class="btn btn-primary jsx mt-4" onclick="scrollToBanner()">Schedule A Free Class</button>
          </div>
      </div>
  </div>
  <div class="bg-circle" data-scroll-zoom>
      <svg width="570" height="570" viewBox="0 0 570 570" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
              <linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" style="stop-color:#fff6c8;stop-opacity:1" />
                  <stop offset="100%" style="stop-color:#fff;stop-opacity:.01" />
                </linearGradient>
            </defs>
          <path d="M285 570C442.401 570 570 442.401 570 285C570 127.599 442.401 0 285 0C127.599 0 0 127.599 0 285C0 442.401 127.599 570 285 570Z" fill="url(#grad1)" ></path>
      </svg>
  </div>
</section>

{{-- <section class="what-we-teach">
  <div class="container">
        <div class="section-title mb-3">
            <h2 class="text-primary">What We Teach</h2>
        </div>
      <div class="row align-items-center">
        <div class="col-lg-12">
            
            <div class="design-list">
                <h5>What will your child learn?</h5>
                <ul>
                    <li>Introduction to all 18 chapters of  Gita, over 200 shlokas.</li>
                    <li>Learn key shlokas and their meanings and manifestations.</li>
                    <li>Deeper understanding of concepts of Gita like Dharma & Karma.</li>
                    
                    <li>Stories/sagas from Indian scriptures connecting them  to their  Indian heritage.</li>
                </ul>
                
                <h5 class="mt-4">How will Little Yogis benefit children?</h5>
                <ul>
                    <li>Help children make well-informed decisions </li>
                    <li>Build a strong moral compass</li>
                    <li>Strengthen  their character and ethics </li>
                    <li>Enhance core values  of hard work, integrity, kindness, equality, & care</li> 
                </ul>
            </div>
            <button type="button" class="btn btn-primary jsx mt-4" onclick="scrollToBanner()">Schedule A Free Class</button>
        </div>

          
      </div>
  </div>
</section> --}}

<section class="mb-5 mt-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2 class="text-primary">Our Beloved Little Yogis</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-12">
                <div class="owl-carousel owl-theme owl-video-Slide" id="videoScroll">
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-1.jpg') !!}"  onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-1.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-2.jpg') !!}"  onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-2.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-3.jpg') !!}"  onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-3.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-4.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-4.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-5.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-5.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-6.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-6.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-7.jpg') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-7.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-8.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-8.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-9.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-9.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-10.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-10.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-11.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-11.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-12.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-12.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-13.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-13.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-14.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-14.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-15.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-15.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-16.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-16.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-17.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-17.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-18.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-18.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-19.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-19.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-20.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-20.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-21.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-21.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-22.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-22.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-23.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-23.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                    <div class="video-click">
                        <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/gita/gita-24.png') !!}" onclick="this.play();" width="100%">
                            <source src="{!! asset('public/assets/frontend1/video/gita/gita-24.mp4') !!}" type="video/mp4" >
                        </video>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="course-faculty-sec mb-5" id="_Instructors">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10 mx-auto text-center my-4">
                <div class="section-title text-center mb-2">
                    <h2 class="text-primary">Our Awesome Bhagavad Gita Teachers</h2>
                </div>
                
            </div>
        </div>
        <div class="faculty__carousel_area">
            <div class="owl-carousel owl-theme" id="educators-carousel">
                @foreach($course->faculties as $faculty)
                    <div class="faculty_container">
                        <div class="faculty_image_area">
                            <img class="img-fluid" src="{{ $faculty->photo ? asset('public/images/faculty/' . $faculty->photo) : asset('public/assets/parent/images/filter-left.jpg') }}" alt="faculty image">
                            <div class="faculty_caption">
                                <div class="faculty_name">
                                    <h5>{{ $faculty->first_name }} {{ $faculty->last_name }}</h5>
                                </div>
                                @php
                                    $ratings = $faculty->stats->pluck('rating_l30d_rating')->filter()->all();
                                    $avg = !empty($ratings) ? number_format(array_sum($ratings) / count($ratings), 1, '.', '') : '4.6';
                                    $avg = max($avg, '4.6'); // Ensure a minimum rating of 4.6
                                @endphp
                                @if($avg > 0)
                                    <div class="_ficonPart mt-2">
                                        <div class="icon_image">
                                            <svg viewBox="0 0 24 24"><path d="M12 17.27l6.18 3.73-1.64-7.030 5.46-4.73-7.19-0.61-2.81-6.63-2.81 6.63-7.19 0.61 5.46 4.73-1.64 7.030 6.18-3.73z"></path></svg>
                                        </div>
                                        <div class="icon_text">{{ $avg }} Instructor Rating</div>
                                    </div>
                                @endif
                                <div class="faculty_text">
                                    @if($faculty->bio)
                                        {{ Str::limit($faculty->bio, 68, '...') }}
                                        <button type="button" class="btn btn-link p-0 openfacultymodal" data-action="{{ route('frontend.coursefaculty.show', $faculty->id) }}">..Read More</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="faculty-dark-bg">
                            <div class="mb-2 faculty-lang">Speaks:
                                <strong>
                                {{ $faculty->languages->pluck('language')->implode(', ') }}
                                </strong>
                            </div>
                            <div class="d-sm-flex">
                                @if($faculty->id == 525)
                                    <label class="badge badge-warning badge-demo mr-3">Experience: 4 years</label>
                                @endif
                                @if($faculty->teaching_experience)
                                    <label class="badge badge-warning badge-demo mr-3">Experience: {{ $faculty->teaching_experience }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>
</section>



<section class="mb-4 pb-5">
  <div class="container">
  <div class="row align-items-center">
      <div class="col-xl-4">
          <div class="section-title mb-4 text-center text-xl-left">
              <h2>Parents Feedback</h2>
              <div class="avg-rating mb-3 mt-3">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                  <b>4.7/5</b>
                  <span>(2.9K Reviews)</span>
              </div>
              <div>
                  <a href="https://search.google.com/local/reviews?placeid=ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" title="Check All Reviews" rel="noopener">
                      <img src="{!! asset('public/assets/frontend1/images/bambinos_google_logo.png') !!}" style="height:46px;" alt="bambinos.live Reviews">
                  </a>
                  <div class="mt-1" style="color:#000;">
                      <div itemscope="" itemtype="http://schema.org/Product">
                          <span itemprop="name">bambinos.live <a href="https://search.google.com/local/reviews?placeid=ChIJD6H5w50UrjsRpF_IYcgu7DI" target="_blank" title="Check All Reviews" rel="noopener"> Reviews</a></span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-8">
          <div class="owl-carousel owl-theme owl-video-Slide" id="kids">
              
              <div class="video-click">
                  <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/parent9.jpg') !!}" onclick="this.play();" width="100%">
                      <source src="{!! asset('public/assets/frontend1/video/parent9.mp4') !!}" type="video/mp4" >
                  </video>
              </div>
              <div class="video-click">
                  <video controls="false" preload="none" loop="" playsinline="" poster="{!! asset('public/assets/frontend1/video/parent10.jpg') !!}" onclick="this.play();" width="100%">
                      <source src="{!! asset('public/assets/frontend1/video/parent10.mp4') !!}" type="video/mp4" >
                  </video>
              </div>
          </div>
      </div>
  </div>
      
  </div>
</section>

<section class="testibg">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2>Founding Team</h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="founders-wrap">
              <h5 class="founder-name text-center">Ashish Gupta</h5>
              <div class="founder-designation text-center">Founder, CEO</div>
              <div class="founder-img text-center mx-auto mb-2"><img class="img-fluid" src="{!! asset('public/assets/frontend1/images/team/ashish.jpg') !!}" alt="ashish Gupta"></div>
              
                <div class="ribbon-container">
                  <div class="ribbon">
                    <div class="ribbon-content text-center">
                        <div class="founder-ex-com-design text-center">Ex-Amazon</div>
                        <span>IIM Calcutta</span>
                    </div>
                  </div>
                </div>
                {{-- <div class="founder-desc">14+ Years of Experience across various roles panning Supply Chain and Sales Business Partnering in India’s biggest FMCG organization, Hindustan Unilever.
              </div> --}}
            </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="founders-wrap">
                  <h5 class="founder-name text-center">Gaurav Brar</h5>
                  <div class="founder-designation text-center">Co-Founder, CBO</div>
                  <div class="founder-img text-center mx-auto mb-2"><img class="img-fluid" src="{!! asset('public/assets/frontend1/images/team/gaurav.jpg') !!}"></div>
                  
                  
                    <div class="ribbon-container">
                      <div class="ribbon">
                        <div class="ribbon-content">
                            <div class="founder-ex-com-design text-center">Ex CEO EuroKids | Ex Disney</div> 
                            <span>IIM Calcutta</span>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="founders-wrap">
                  <h5 class="founder-name text-center">Jas Johari</h5>
                  <div class="founder-designation text-center">Head of Learning</div>
                  <div class="founder-img text-center mx-auto mb-2"><img class="img-fluid" src="{!! asset('public/assets/frontend1/images/team/jas.jpg') !!}"></div>
                  
                  
                    <div class="ribbon-container">
                      <div class="ribbon">
                        <div class="ribbon-content"> 
                            <div class="founder-ex-com-design text-center">Senior Educationist</div>
                            <span>Trinity College, London</span>
                        </div>
                      </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="founders-wrap">
                  <h5 class="founder-name text-center">Aparna Sharma</h5>
                  <div class="founder-designation text-center">Head of Curriculum</div>
                  <div class="founder-img text-center mx-auto mb-2"><img class="img-fluid" src="{!! asset('public/assets/frontend1/images/team/aparna.jpg') !!}"></div>
                  
                  
                    <div class="ribbon-container">
                      <div class="ribbon">
                        <div class="ribbon-content"> 
                            <div class="founder-ex-com-design text-center">Senior Educationist</div>
                            <span>English Creative Writing Expert</span>
                        </div>
                      </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-round btn-light" onclick="scrollToBanner()">Schedule a Free Class</button>
        </div>
    </div>
</section>


{{-- <section class="features-sec pt-5">
    
    <div class="container">
        <div class="row align-items-center">
            

            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="home-steps-body">
                    <div class="section-title text-center mb-3">
                        <!-- <h4>Here is how we help</h2> -->
                        <h2>Creating Leaders, <span class="d-block">One Child At A Time</span></h2>
                    </div>
                    <!-- <p>The detailed courses help your child define tomorrow, not let the future define their journey </p> -->
                    <div class="home-steps-content mt-4">
                        <div class="home-steps-box">
                            <div class="home-steps-icon">
                                <h4>4.8<sup>+</sup></h4>
                            </div>
                            <h3>Parent Rating</h3>
                        </div>
                        <div class="home-steps-box">
                            <div class="home-steps-icon">
                                <h4>100 Million<sup>+</sup></h4>
                            </div>
                            <h3>Minute of Teaching</h3>
                        </div>
                        <div class="home-steps-box">
                            <div class="home-steps-icon">
                                <h4>250<sup>+</sup></h4>
                            </div>
                            <h3>Educators</h3>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-round btn-warning">Schedule a Free Class</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 pl-lg-5 mt-5 mt-lg-0">
                <img class="img-fluid"  src="{!! asset('https://www.bambinos.live/public/assets/frontend/images/bambinos-global.jpg') !!}" alt="image">
            </div>
            
        </div>
    </div>
</section> --}}

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
@endsection

@section('js')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{!! asset('public/assets/booking1/js/owl.carousel.min.js') !!}"></script>
<script defer src="{{ asset('/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>         

<script>
    $(document).ready(function() {
        function scrollToBanner() {
            $("html, body").stop().animate({
                scrollTop: $('.form-card').offset().top - 105
            }, 1000);
        }

        $('.video-click video').on('play', function() {
            $('.video-click video').not(this).each(function() {
                this.pause();
            });
        });

        function initializeCarousel(selector, options) {
            $(selector).owlCarousel(options);
        }

        initializeCarousel('#educators-carousel', {
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
                1100: { items: 3 },
                992: { items: 2 },
                768: { items: 2 },
                480: { items: 1, margin: 15, autoplay: false, nav: false, stagePadding: 20 },
                0: { items: 1, margin: 15, autoplay: false, nav: false, stagePadding: 20 }
            }
        });

        initializeCarousel('#videoScroll', {
            items: 3,
            loop: false,
            margin: 20,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            autoplay: false,
            autoplayTimeout: 2200,
            autoplaySpeed: 2500,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                1200: { items: 4 },
                992: { items: 3 },
                768: { items: 3 },
                576: { items: 2 },
                0: { items: 1, margin: 15, nav: false, stagePadding: 55, autoplay: false }
            }
        });

        initializeCarousel('#kids', {
            items: 2,
            loop: false,
            margin: 25,
            stagePadding: 55,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            autoplay: false,
            autoplayTimeout: 2200,
            autoplaySpeed: 2500,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                1200: { items: 2 },
                992: { items: 3 },
                768: { items: 3 },
                480: { items: 2 },
                0: { items: 1, margin: 25, stagePadding: 55, nav: false, autoplay: false }
            }
        });

        function scrollZoom() {
            const images = document.querySelectorAll("[data-scroll-zoom]");
            let scrollPosY = 0;
            const scaleAmount = 0.55;
            const observerConfig = {
                rootMargin: "0% 0% 0% 0%",
                threshold: 0
            };

            images.forEach(image => {
                let isVisible = false;
                const observer = new IntersectionObserver((elements) => {
                    elements.forEach(element => {
                        isVisible = element.isIntersecting;
                    });
                }, observerConfig);

                observer.observe(image);

                image.style.transform = `scale(${1 + scaleAmount * percentageSeen(image)})`;

                window.addEventListener("scroll", () => {
                    if (isVisible) {
                        scrollPosY = window.pageYOffset;
                        image.style.transform = `scale(${1 + scaleAmount * percentageSeen(image)})`;
                    }
                });

                function percentageSeen(el) {
                    const rect = el.getBoundingClientRect();
                    const height = rect.height;
                    const top = Math.max(rect.top, 0);
                    const bottom = Math.min(window.innerHeight, rect.bottom);
                    return (bottom - top) / height;
                }
            });
        }

        scrollZoom();
    });
</script>

@include('newadsignup.commonjs')

@endsection
