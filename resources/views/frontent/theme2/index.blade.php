@extends('frontent.theme2.layouts.web')
@section('content')

    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->
    
   
   
    
    <section id="slider-part" class="slider-active">
        @foreach ($banners as $banner)
        <div class="single-slider bg_cover pt-150" style="background-image: url({{ Config::get('app.s3_url').$banner->image }}); height:80vh;" >
             
        </div> 

        @endforeach
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
   
    <!--====== CATEGORY PART START ======-->
    

    
    <!--====== CATEGORY PART ENDS ======-->
   
    <!--====== ABOUT PART START ======-->
    
    <section id="about-part" class="pt-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>About us</h5>
                        <h3>WELCOME TO {{@$info->name}} </h3>
                        
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>{!! Str::limit($info->about,120) ?? '' !!}</p>
                        <a href="{{url('/page/history')}}" class="main-btn mt-55">Learn More</a>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-event mt-50">
                        <div class="event-title">
                            <h3>Latest Notice</h3>
                        </div> <!-- event title -->
                        <ul>
                            @foreach ($notices as $item)
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i>Publihed: {!! $item->published_date !!}</span>
                                    <a href="{{ route('web.noticeShow', $item->id) }}"><h4>{!! $item->title !!}</h4></a>
                                </div>
                            </li>
                            @endforeach
                            
                            
                        </ul> 
                    </div> <!-- about event -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-bg">
            <img src="{{asset('theme2/images/about/bg-1.png')}}" alt="About">
        </div>
    </section>
    
    <!--====== ABOUT PART ENDS ======-->
   
    <!--====== APPLY PART START ======-->
    
    {{-- <section id="apply-aprt" class="pb-120">
        <div class="container">
            <div class="apply">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="apply-cont apply-color-1">
                            <h3>Apply for fall 2019</h3>
                            <p>Gravida nibh vel velit auctor aliquetn sollicitudirem sem quibibendum auci elit cons equat ipsutis sem nibh id elituis sed odio sit amet nibh vulputate cursus equat ipsutis.</p>
                            <a href="#" class="main-btn">Apply Now</a>
                        </div> <!-- apply cont -->
                    </div>
                    <div class="col-lg-6">
                        <div class="apply-cont apply-color-2">
                            <h3>Apply for scholarship</h3>
                            <p>Gravida nibh vel velit auctor aliquetn sollicitudirem sem quibibendum auci elit cons equat ipsutis sem nibh id elituis sed odio sit amet nibh vulputate cursus equat ipsutis.</p>
                            <a href="#" class="main-btn">Apply Now</a>
                        </div> <!-- apply cont -->
                    </div> 
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section> --}}
    
    <!--====== APPLY PART ENDS ======-->
   
    <!--====== COURSE PART START ======-->
    
   
    
    <!--====== COURSE PART ENDS ======-->
   
    <!--====== VIDEO FEATURE PART START ======-->
    
    <section id="video-feature" class="bg_cover pt-60 pb-110" style="background-image: url({{asset('theme2/images/bg-1.jpg')}})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-last order-lg-first">
                    <div class="video text-lg-left text-center pt-50">
                        <a class="Video-popup" href="https://www.youtube.com/watch?v=bRRtdzJH1oE"><i class="fa fa-play"></i></a>
                    </div> <!-- row -->
                </div>
                <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                    <div class="feature pt-50">
                        <div class="feature-title">
                            <h3>একনজরে প্রতিষ্ঠান সম্পর্কে</h3>
                            <h5 style="color:white;">OUR LEARNER BAED PROGRAM</h5>
                        </div>
                        <ul>
                            <li>
                                <div class="singel-feature">
                                    <div class="cont" style="color:white;">
                                        {!! $ataglance->content ?? '' !!}
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                        </ul>
                    </div> <!-- feature -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="feature-bg"></div> <!-- feature bg -->
    </section>
    
    <!--====== VIDEO FEATURE PART ENDS ======-->
   
    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>Committee </h5>
                        <h3>Meet Our Governingbody</h3>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                        <a href="#" class="main-btn mt-55">Career with us</a>
                    </div> <!-- teachers cont -->
                </div>

               
                <div class="col-lg-6 offset-lg-1">
                    <div class="teachers mt-20">
                        <div class="row">
                            @foreach ($commitees as $key => $committee)
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('theme2/images/teachers/t-1.jpg')}}" alt="Teachers">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h6>{{@$committee->name}}</h6></a>
                                        <span>{{@$committee->designation->title }}</span>
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            @endforeach
                        </div> <!-- row -->
                    </div> <!-- teachers -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->
   
    <!--====== PUBLICATION PART ENDS ======-->
   
    <!--====== TEASTIMONIAL PART START ======-->
    
    <section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url({{asset('theme2/images/bg-2.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-40">
                        <h5>Message</h5>
                        <h2>What they say</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row testimonial-slied mt-40">

                @foreach ($messages as $item)
                <div class="col-lg-6">
                    <div class="singel-testimonial">
                        <div class="testimonial-thum">
                            @if ($item->image === 'default.png')
                            <img src="{{ Helper::default_image() }}" alt="">
                            @else
                            <img src="{{ asset('uploads/messages/'.$item->image) }}" width="120px" alt="">
                            @endif
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        
                        <div class="testimonial-cont">
                            <span>{!! Str::limit($item->content,120) ?? '' !!}</span>
                            <h6>{{@$item->messager_name}}</h6>
                            <span>{{@$item->messager_designation}}</span>
                        </div>
                    </div> <!-- singel testimonial -->
                </div>
                @endforeach
                
            </div> <!-- testimonial slied -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEASTIMONIAL PART ENDS ======-->
   
    <!--====== NEWS PART START ======-->
    
    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-50">
                        <h5>Latest Notice</h5>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">

                    <div class="EventImg">
                        @if($info)
                        <img src="{{ asset('uploads/schoolInfo/'.$info->school_photo)}}" alt="">
                        @endif
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                
                            </div>
                           
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">

                                    @foreach ($events as $item)
                                    <ul class="mt-3">
                                        
                                        <li><a href="#"><i class="fa fa-calendar"></i>{!! $item->event_date !!} </a></li>
                                    </ul>
                                    <a href="blog-singel.html"><h3>{!! $item->title !!}</h3></a>
                                    <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons  vel.</p>
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> 
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== NEWS PART ENDS ======-->
   
    <!--====== PATNAR LOGO PART START ======-->
    
    <div id="patnar-logo" class="pt-40 pb-80 gray-bg">
        <div class="container">
            <div class="row patnar-slied">
                @foreach ($ins_photos as $item)
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <a class="my-image-links" data-gall="gallery01" href="{{ Helper::ins_image($item) }}">
                        @if ($item->image === 'default.png')
                        <img src="{{asset('frontend_assets/images/gal1.png')}}" alt="">
                        @else
                        <img src="{{ 'uploads/institutephoto/' . $item->image }}" alt="">
                        @endif
                    </a>
                    </div>
                </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </div> 
    
    <!--====== PATNAR LOGO PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TP PART START ======-->
    

    
    <!--====== BACK TO TP PART ENDS ======-->
    @endsection

    @push('js')
    <script>
            $(document).ready(function() {
                // Open Modal
               let defaultLang = 'en';
    
               changeLanguage(defaultLang)
               function changeLanguage(lang){
                   $.get("{{route('change-lang')}}",{lang},function (data){
                       console.log(data)
                   });
               }
            });
        </script>
    @endpush
