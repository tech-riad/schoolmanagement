@extends('frontent.theme1.layouts.web')
@section('content')
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START Banner PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Banner">

    <div class="swiper BannerSlider">

        <div class="swiper-wrapper">
            <!-- item -->
            @foreach (@$banners as $banner)
            <div class="swiper-slide">
                <div class="img">
                    <img src="{{ Config::get('app.s3_url').$banner->image }}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="next"><i class="fas fa-chevron-right"></i></div>
    <div class="prev"><i class="fas fa-chevron-left"></i></div>

</section>


<section class="Programs">

    <div class="container">

        <div class="row d_flex">

            <!-- left -->
            <div class="col-lg-8 col-sm-12">

                <div class="ProgramsContent">

                    <div class="row">

                        <!-- item -->
                        <div class="col-lg-4 col-sm-4">

                            <div class="ProgramsItem d_flex" data-aos="flip-up">

                                <div class="img"><i class="fas fa-book"></i></div>

                                <div class="text">

                                    <a href="{{url('/page/class-routine')}}">
                                        <h4>{{ __('lang.class_routine') }}</h4>
                                        <p>সকল ক্লাসের রুটিন সহ বিস্তারিত</p></a>

                                </div>

                            </div>

                        </div>

                        <!-- item -->
                        <div class="col-lg-4 col-sm-4">

                            <div class="ProgramsItem d_flex" data-aos="flip-up">

                                <div class="img two"><i class="fas fa-bell"></i></div>

                                <div class="text">
                                    <a href="{{url('/page/exam-routine')}}">
                                        <h4>{{ __('lang.exam_routine') }}</h4>
                                        <p>সকল পরীক্ষার রুটিন দেখুন</p>
                                    </a>

                                </div>

                            </div>

                        </div>

                        <!-- item -->
                        <div class="col-lg-4 col-sm-4">

                            <div class="ProgramsItem d_flex" data-aos="flip-up">

                                <div class="img three"><i class="fas fa-award"></i></div>

                                <div class="text">
                                    <a href="{{url('/page/result')}}">
                                        <h4>{{ __('lang.online_result') }}</h4>
                                        <p>প্রতিষ্ঠানের সকল রেজাল্ট দেখুন</p>

                                    </a>

                                </div>

                            </div>

                        </div>

                        <!-- item -->
                        <div class="col-lg-4 col-sm-4 MobileHazira">

                            <div class="ProgramsItem d_flex" data-aos="flip-up">

                                <div class="img one"><i class="fas fa-award"></i></div>

                                <div class="text">
                                    <h4>ডিজিটাল হাজিরা</h4>
                                    <p>প্রতিষ্ঠানের সকল রেজাল্ট দেখুন</p>
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

            <!-- right -->
            <div class="col-lg-4 col-sm-12">

                <div class="ProgramsRight">

                    <h3>নোটিশ সমূহ <i class="fas fa-arrow-alt-circle-right"></i></h3>
                    <p>প্রতিষ্ঠানের সকল নোটিশ এর আপডেট</p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START Programs PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="LatestNews">

    <div class="container">

        <div class="row">

            <!-- left Content -->
            <div class="col-lg-8 col-sm-12">

                <div class="LatestNewsLeft">

                    <!-- <h4>Please input an email down below and hit subscribe now in order to get the latest news or
                            Request a quote</h4> -->

                    <div class="LatestNewsLeftContent">

                        <div class="row">

                            @foreach ($messages as $item)
                            <!-- item -->
                            <div class="col-lg-4 col-sm-4">

                                <div class="LatestNewsLeftItem" data-aos="flip-up">

                                    <div class="img">
                                        @if ($item->image === 'default.png')
                                        <img src="{{ Helper::default_image() }}" alt="">
                                        @else
                                        <img src="{{ asset('uploads/messages/'.$item->image) }}" alt="">
                                        @endif
                                    </div>

                                    <div class="text">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{!! Str::limit($item->content)  !!}<a href="{{ route('web.messages',$item->id) }}" style="color: #009900;">বিস্তারিত</a></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- right Content -->
            <div class="col-lg-4 col-sm-12">
                @if ($notices->count()<5)
                <div class="LatestNewsRight">
                    <ul>
                        @foreach ($notices as $notice)
                        <li><a href="{{ route('web.noticeShow', $notice->id) }}"> <strong>Published-
                                    {{ $notice->published_date }}</strong> {{ $notice->title }}
                                <span>বিস্তারিত</span></a></li>
                        @endforeach
                    </ul>
            </div>
                @else
                    <div class="LatestNewsRight">
                    <marquee width="100%" direction="up" height="340px" scrollamount="3">
                        <ul>
                            @foreach ($notices as $notice)
                            <li><a href="{{ route('web.noticeShow', $notice->id) }}"> <strong>Published-
                                        {{ $notice->published_date }}</strong> {{ $notice->title }}
                                    <span>বিস্তারিত</span></a></li>
                            @endforeach
                        </ul>
                        </marquee>
                </div>
                @endif




            </div>

        </div>

    </div>

</section>

</ul>

</div>

</div>

</div>

</div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START VisiteSchool PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="VisiteSchool">

    <div class="container">

        <div class="row">

            <!-- item -->
            <div class="col-lg-4 col-sm-4">

                <div class="VisiteSchoolContent d_flex" data-aos="flip-up">

                    <div class="img">
                        <i class="fas fa-calendar-week"></i>
                    </div>

                    <div class="text">

                        <h4><a href="{{url('/page/merit-students-list')}}">ACHIVMENT</a></h4>


                    </div>

                </div>

            </div>

            <!-- item -->
            <div class="col-lg-4 col-sm-4">

                <div class="VisiteSchoolContent d_flex" data-aos="flip-up">

                    <div class="img">
                        <i class="fas fa-bell"></i>
                    </div>

                    <div class="text">

                        <h4>ALUMNI</h4>


                    </div>

                </div>

            </div>

            <!-- item -->
            <div class="col-lg-4 col-sm-4">

                <div class="VisiteSchoolContent d_flex" data-aos="flip-up">

                    <div class="img">
                        <i class="fas fa-tasks"></i>
                    </div>

                    <div class="text">

                        <h4><a href="{{url('/page/teachers')}}">BSET TEACHERS</a></h4>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START WhyChooseUs PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="WhyChooseUs section_gaps">

    <div class="container">

        <div class="row">

                <!-- item -->
                <div class="col-lg-4 mb-3">

                <!-- StudentTestimonial -->
                <div class="StudentTestimonial" data-aos="flip-up">

                    <h3>কৃতি শিক্ষার্থী বৃন্দ</h3>
                    <h5>STUDENTS TESTIMONIALS</h5>

                    @foreach ($meritstudent as $s)
                    <div class="StudentTestimonialItem d_flex" style="height: 100px;">
                        <div class="img">
                            @if($s->student->photo)
                                <img src="{{Config::get('app.s3_url').$s->student->photo}}" alt="">
                            @else
                                <img src="{{asset('male.png')}}" alt="">
                            @endif
                        </div>
                        <div class="text">
                            <h3>{{@$s->student->name ?? '' }}<span>Said</span></h3>
                            <span>Class-{{@$s->student->class->name ?? '' }},Group-{{@$s->student->group->name ?? '' }}</span>
                            <h4>Roll-{{@$s->student->roll_no ?? '' }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

                <!-- item -->
                <div class="col-lg-4 mb-3">

                <!-- StudentTestimonial -->
                <div class="StudentTestimonial" data-aos="flip-up">

                    <h3>একনজরে প্রতিষ্ঠান সম্পর্কে </h3>
                    <h5>OUR LEARN BASED PROGRAM</h5>


                    {!! @$ataglance->content ?? '' !!}




                </div>


            </div>

            <!-- item -->
            <div class="col-lg-4">

                <!-- StudentTestimonial -->
                <div class="StudentTestimonial WorkingHour" data-aos="flip-up">

                    <h3>ক্লাসের সময়সূচী</h3>
                    <h5>ক্লাসের সময়সূচী বিস্তারিত</h5>

                    <ul>
                        <li>রবিবার <span>10:00 am -4:00 pm</span></li>
                        <li>সোমবার <span>10:00 am -4:00 pm</span></li>
                        <li>মঙ্গলবার <span>10:00 am -4:00 pm</span></li>
                        <li>বুধবার <span>10:00 am -4:00 pm</span></li>
                        <li>বৃহস্পতিবার <span>10:00 am -4:00 pm</span></li>
                        <li>Provides opportunities for the child to explore elementary school</li>
                    </ul>


                </div>


            </div>

        </div>

    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START Founded PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="VisiteSchool Founded">

    <div class="container">

        <div class="row">

            <!-- item -->
            <div class="col-lg-3 col-sm-6">

                <div class="VisiteSchoolContent d_flex" data-aos="flip-up">

                    <div class="img">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="text mt-4">
                        <h4>FOUNDED {{ @$info->founded_at }}</h4>

                    </div>

                </div>

            </div>

            <!-- item -->
            <div class="col-lg-3 col-sm-6">

                <div class="VisiteSchoolContent d_flex" data-aos="flip-up">

                    <div class="img two">
                        <i class="fas fa-book-reader"></i>
                    </div>

                    <div class="text mt-4">

                        <h4>TEACHERS {{ $teachers->count() }}</h4>


                    </div>

                </div>

            </div>

            <!-- item -->
            <div class="col-lg-3 col-sm-6">

                <div class="VisiteSchoolContent d_flex" data-aos="flip-up">

                    <div class="img three">
                        <i class="fas fa-bell"></i>
                    </div>

                    <div class="text mt-4">

                        <h4>STUDENT {{ $students->count() }}</h4>


                    </div>

                </div>

            </div>

            <!-- item -->
            <div class="col-lg-3 col-sm-6">

                <div class="VisiteSchoolContent d_flex" data-aos="flip-up">

                    <div class="img four">
                        <i class="fas fa-paper-plane"></i>
                    </div>

                    <div class="text mt-4">

                        <h4>ADMISSION</h4>

                    </div>

                </div>

            </div>



        </div>

    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START Blog PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Blog section_gaps">

    <div class="container">
        @if($videos->count() > 0)
        <div class="row">

            <div class="col-lg-6">

                <div class="header">
                    <h2>Latest Video</h2>
                    <p>KEEP UPDATED</p>
                </div>

            </div>

        </div>
        @endif
        {{-- My modal --}}

        <div class="row">
            <!-- item -->
            @foreach ($videos as $video)


                <div class="col-lg-3 col-sm-6">
                <div class="BlogContent" data-aos="flip-up">
                    <div class="img video-image">
                        @if(@$video->type == 'youtube')


                                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$video->code}}"
                                    title="{{ $video->title }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                        @else

                        <iframe src="https://player.vimeo.com/video/{{$video->code}}?h=a0ad2b66b3" width="100%" height="200"
                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        @endif
                    </div>
                    <div class="text">
                        <h5><i class="fas fa-calendar-week"></i> {{ $video->date }}</h5>
                        <h6>{{ $video->title }}</h6>
                    </div>

                </div>
            </div>
            @endforeach



        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START Event PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Event section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 m-auto">

                <div class="header text-center">
                    <h2>Events</h2>
                    <p>KEEP UPDATED</p>
                </div>

            </div>

        </div>

        <div class="EventContent">

            <div class="row d_flex">

                <!-- img -->
                <div class="col-lg-6">

                    <div class="EventImg">
                        @if($info)
                        <img src="{{ asset('uploads/schoolInfo/'.$info->school_photo)}}" alt="">
                        @endif
                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-6">

                    <div class="EventItem">

                        <p>Event List</p>

                        <ul>
                            @foreach ($events as $item)
                            <li>
                                <div class="Date">
                                    <h4>{{ date('M', strtotime($item->event_date)) }}
                                        <span>{{ date('d', strtotime($item->event_date)) }}</span>
                                    </h4>
                                </div>

                                <a href="{{ route('web.eventShow', $item->id) }}">{{ $item->title }}</a>
                            </li>
                            @endforeach


                        </ul>

                    </div>

                </div>

            </div>

        </div>


    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START Gallery PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Gallery section_gaps" data-aos="zoom-in">

    <div class="container">
        @if($ins_photos->count() > 0)
        <div class="row">

            <div class="col-lg-6 m-auto">

                <div class="header text-center">
                    <h2>Institute Photos</h2>
                </div>

            </div>

        </div>
        @endif

        <!-- GalleryContent -->
        <div class="GalleryContent">

            <div class="row">

                <div class="col-lg-12 col-sm-12">

                    <div class="row">

                        <!-- img -->
                        @foreach ($ins_photos as $item)
                        <div class="col-lg-3 col-sm-4">
                            <div class="GalleryImg">
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
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
                START Footer PART
            --------------------------------------------------------------------------------------------------------------------------------------------------- -->
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
