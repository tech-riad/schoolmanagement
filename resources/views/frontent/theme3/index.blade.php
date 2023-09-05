@extends('frontent.theme3.layouts.web')
@section('content')
<!--header-section---->

<!----section-2------->
<section>
    <div class="wrap bg2">
        <div class="container-fluid">
            <div class="confetti">
                <img src="{{asset('theme3/img/confeti.png')}}" alt="" />
            </div>
            <div class="row">
                <!--events-->
                <div class="col-lg-2"></div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="confetti2">
                        <img src="{{asset('theme3/img/enent.png')}}" class="forimagmargin" alt="" />
                    </div>
                    <div class="EventImg ">
                        @if($info)
                        <img src="{{ asset('uploads/schoolInfo/'.$info->school_photo)}}" alt="">
                        @endif
                    </div>
                </div>
                <!--notice-->
                <div class="col-lg-3 fororder" data-aos="fade-up" data-aos-offset="50">
                    <div class="confetti2">
                        <img src="img/notice (1).png" class="forimagmargin22" alt="" />
                    </div>
                    <div class="tab">
                        <div class="all_events" id="scoll" data-simplebar data-simplebar-auto-hide="false">
                            @foreach ($events as $item)
                            <div class="event_item">
                                <div class="dates">
                                        <p>{!! $item->event_date !!}</p>
                                    {{-- <h1>7</h1> --}}
                                </div>
                                <div class="events">
                                    <a href="{{ route('web.eventShow', $item->id) }}">
                                        <p>{!! $item->title !!}</p>
                                    </a>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </div>
</section>
{{-- notice --}}
<section>
    <div class="wrap bg2">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-3">
                    <div class="section-title mt-50">
                        <h5>About us</h5>
                        <h3>WELCOME TO {{@$info->name}} </h3>
                        
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>{!! Str::limit($info->about,120) ?? '' !!}</p>
                        <a href="{{url('/page/history')}}" class="main-btn mt-55">Learn More</a>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-4 offset-lg-1">
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

            </div>
        </div>
    </div>
</section>
<!--section-7------->
<section>
    <div class="wrap bg7">
        <div class="container">
            <h2>
                <div class="trinagle"></div>
                গুরুজন কি বলেন
                <div class="trinagle1"></div>
            </h2>
            <div class="row mt-3">
                <!--this part is for show-->
                @foreach ($messages as $item)
                <div class="col-sm-4 col-md-4 col-lg-4 formargin" data-aos="fade-up">
                    @if ($item->image === 'default.png')
                    <div class="cover_img">
                        <img src="{{ Helper::default_image() }}" height="220px" alt="" />
                    </div>
                    @else
                    <div class="cover_img">
                        <img src="{{ asset('uploads/messages/'.$item->image) }}" height="220px" alt="" />
                    </div>
                    @endif
                    <h3 class="names">{{@$item->messager_name}}</h3>
                    <h4>
                        <div class="triangle3"></div>
                        {{@$item->messager_designation}}
                    </h4>
                    <!--show-text-->
                    <p>
                        {!! Str::limit($item->content,120) ?? '' !!}
                        <a href="{{ route('web.messages',$item->id) }}" class="readMore">Read More →</a>
                        {{-- <button class="readMore"></button> --}}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--section-9------->
<section>
    <div class="wrap bg9">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-4 mt-md-0">
                    <h1><i class="fas fa-id-card"></i></h1>
                    <h1><span class="counter">{{Helper::all_student()->count()}}</span><span>+</span></h1>
                    <h1>students</h1>
                </div>
                {{-- <div class="col-md-4 mt-4 mt-md-0">
                    <h1><i class="fas fa-award"></i></h1>
                    <h1><span class="counter"> 100</span></h1>
                    <h1>awards</h1>
                </div> --}}
                <div class="col-md-4 mt-4 mt-md-0">
                    <h1><i class="fas fa-chalkboard-teacher"></i></h1>
                    <h1><span class="counter"> {{Helper::all_teacher()->count()}}</span><span>+</span></h1>
                    <h1>teachers</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section--3------>
{{-- <section>
    <div class="wrap bg3">
        <div class="container">
            <h6>What do you need?</h6>
            <h2>WE’VE GOT YOU COVERED!</h2>
            <div class="row mt-md-5 mt-4">
                <div class="col-md-4 p-0" data-aos="fade-up">
                    <div class="mini_image"><img src="img/24.png" alt="" /></div>
                    <div class="mini_image"><img src="img/25.png" alt="" /></div>
                    <div class="mini_image"><img src="img/26.png" alt="" /></div>
                    <div class="mini_image"><img src="img/27.png" alt="" /></div>
                </div>
                <div class="col-md-4 p-0" data-aos="fade-up">
                    <div class="mini_image"><img src="img/30.png" alt="" /></div>
                    <div class="mini_image"><img src="img/31.png" alt="" /></div>
                    <div class="mini_image"><img src="img/32.png" alt="" /></div>
                </div>
                <div class="col-md-4 p-0" data-aos="fade-up">
                    <div class="mini_image"><img src="img/34.png" alt="" /></div>
                    <div class="mini_image"><img src="img/35.png" alt="" /></div>
                    <div class="mini_image"><img src="img/36.png" alt="" /></div>
                    <div class="mini_image"><img src="img/37.png" alt="" /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-sm-6 col-6 mt-sm-5 mt-3 forpadding" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom">
                    <div class="clr_item clrbg1">
                        <h4>GENERAL KNOWLEDGE</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-6 mt-sm-5 mt-3 forpadding" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom">
                    <div class="clr_item clrbg2">
                        <h4>ISLAMIC STUDY</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-6 mt-sm-5 mt-3 forpadding" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom">
                    <div class="clr_item clrbg3">
                        <h4>SCIENCE/ARTS</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-6 mt-sm-5 mt-3 forpadding" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom">
                    <div class="clr_item clrbg4">
                        <h4>HIFJUL QURAN</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-6 mt-sm-5 mt-3 forpadding" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom">
                    <div class="clr_item clrbg5">
                        <h3>GIRLS BRANCH</h3>
                        <h4>& HOSTEL</h4>
                        <h4 class="icnn"><i class="fas fa-angle-double-up"></i></h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-6 mt-sm-5 mt-3 forpadding" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom">
                    <div class="clr_item clrbg6">
                        <h4>BOYS HOSTEL IN/OUT</h4>
                    </div>
                </div>
            </div>
            <div class="Determine">
                <p>Determine the right learning path for you</p>
            </div>
        </div>
    </div>
</section> --}}
<!--section-4-------->
{{-- <section>
    <div class="wrap bg4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 formargin" data-aos="fade-up">
                    <div class="cover-offers">
                        <img src="img/_Linked File_.png" alt="" />
                        <div class="under-text">
                            <h3>দেখে নাও</h3>
                            <h2>আমাদের অভ্যন্তরীণ</h2>
                            <h1>সুযোগ সুবিধা</h1>
                            <h3>গুলো</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0" data-aos="fade-up">
                    <div class="offers">
                        <img src="img/tab.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--section-5-------->
{{-- <section>
    <div class="wrap bg5">
        <div class="container">
            <h1>আমাদের ক্লাব তোমার মেধা বিকাশের কেন্দ্র।</h1>
            <div class="counsil">
                <p>click here →</p>
                <a href="#"><img src="img/counsil.png" alt="" /></a>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin" data-aos="zoom-in-up">
                    <div class="cover_club cover_border1">
                        <div class="clubs clubsclr1">
                            <img src="img/club (8).png" alt="" />
                            <h3>DEBATE</h3>
                            <h3>CLUB</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin" data-aos="zoom-in-up">
                    <div class="cover_club cover_border2">
                        <div class="clubs clubsclr2">
                            <img src="img/club (1).png" alt="" />
                            <h3>SCIENCE</h3>
                            <h3>CLUB</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin" data-aos="zoom-in-up">
                    <div class="cover_club cover_border3">
                        <div class="clubs clubsclr3">
                            <img src="img/club (2).png" alt="" />
                            <h3>ART &</h3>
                            <h3>PHOTOGRAPHY</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin" data-aos="zoom-in-up">
                    <div class="cover_club cover_border4">
                        <div class="clubs clubsclr4">
                            <img src="img/club (3).png" alt="" />
                            <h3>SHANJIBON</h3>
                            <h3>BLOOD DONORS</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin" data-aos="zoom-in-up">
                    <div class="cover_club cover_border5">
                        <div class="clubs clubsclr5">
                            <img src="img/club (7).png" alt="" />
                            <h3>WRITERS</h3>
                            <h3>FORUM</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin" data-aos="zoom-in-up">
                    <div class="cover_club cover_border6">
                        <div class="clubs clubsclr6">
                            <img src="img/club (6).png" alt="" />
                            <h3>ENGLISH</h3>
                            <h3>CLUB</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin ml-auto" data-aos="zoom-in-up">
                    <div class="cover_club cover_border7">
                        <div class="clubs clubsclr7">
                            <img src="img/club (5).png" alt="" />
                            <h3>AL-HAITHAM</h3>
                            <h3>MEDIA</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-6 formargin mr-auto" data-aos="zoom-in-up">
                    <div class="cover_club cover_border8">
                        <div class="clubs clubsclr8">
                            <img src="img/club (4).png" alt="" />
                            <h3>JOURNALIST</h3>
                            <h3>FORUM</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--section-6-------->
<section>
    <div class="wrap bg6">
        <div class="container">
            <h2>পড়তে পারো আমাদের</h2>
            <h1>রেগুলার ব্লগ</h1>
            <div class="line">
                <img src="img/line.png" alt="" />
            </div>
            <div class="row mt-3">
                @foreach ($news as $item)
                <div class="col-lg-4 col-md-6 col-sm-6 mt-4 forpaddin">
                    <a href="#" target="_blank">
                        <div class="blog">
                            <img src="{{ Config::get('app.s3_url').$item->image }}" alt="" height="220px" />
                            <div class="blog_title">
                                <h3>{!! $item->title !!}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<!--section-8------->
<section>
    <div class="wrap bg8">
        <div class="container-fluid p-0">
            <h1>photo gallery</h1>
            <div class="row no-gutters gallerys mt-5">
                <!--this part is for show-->
                @foreach ($ins_photos as $item)
                <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="cover_gallerys_img">
                      
                        <a href="{{ Helper::ins_image($item) }}" target="_blank">
                          <img src="{{asset('frontend_assets/images/gal1.png')}}" alt="" width="80px">
                        </a>
                        @if ($item->image === 'default.png')
                        <div class="overlay">
                            <div class="text"><img src="{{asset('theme3/img/z.png')}}" alt="" width="80px"></div>
                        </div>
                        @else
                        <div class="overlay">
                            <div class="text"><img src="{{ 'uploads/institutephoto/' . $item->image }}" alt="" width="80px"></div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <button class="ViewMore2">View More ⟾</button>
    </div>
    </div>
</section>

<!--section-10------->
<section>
    <div class="wrap bg10">
        <div class="container">
            <div class="row m-0">
                <div class="col-lg-10 p-0">
                    <h1 data-aos="fade-down">
                        Do you wish to enrole at Tamirul Millat? Get in touch!
                    </h1>
                </div>
                <div class="col-lg-1 p-0">
                    <a href="tel:{{@$getintouch->phone}}">
                        <div class="cover_img" data-aos="fade-up">
                            <img src="{{asset('theme3/img/phn.png')}}" alt="" />
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section---footer-->

@endsection
