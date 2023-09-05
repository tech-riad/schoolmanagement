@php
// echo Helper::getInstituteId();
$info = App\Models\SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
$getintouch = App\Models\Getintouch::where('institute_id',Helper::getInstituteId())->first();
$sociallink = App\Models\Sociallink::where('institute_id',Helper::getInstituteId())->get();
$getintouch = App\Models\Getintouch::where('institute_id',Helper::getInstituteId())->first();

// dd($getintouch);


// dd($FrontSection);
$header = $FrontSection->where('name', 'Header')->first();


@endphp

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Header PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

<header>
    <!---shape------->


    <div class="shape_img">
        <img src="{{asset('theme3/img/white.png')}}" alt="" />
    </div>

    <!--mail---part-->
    {{-- <div class="wrap bgmail">
        <div class="container-fluid">
            <div class="mails">
                <div class="box1">
                    <a href="" class="">

                        <span> 24-03-2022 5:55PM </span>
                    </a>

                </div>
                <div class="box2">
                    <a href="mailto:tamirulmillat24@gmail.com" class="">
                        <div class="cover_img"><img src="img/mail.png" alt="" /></div>
                        <span>asibmollick4@gmail.com</span>
                    </a>
                    <a href="tel:+8801941913425" class="phon">
                        <div class="cover_img"><img src="img/phn.png" alt="" /></div>
                        <span>+8801822064579</span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
    <!--menu---part-->

    <div class="d-flex">
        <div class="logo">
            <a href="{{url('/')}}">
                @if($info)
                <img style="width: 80px; margin-left: 40px;"
                    src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="">
                @endif
            </a>
        </div>
        <div class="millat">
            <h4>{{@$info->name}}</h4>
            @if($info)
            <p> East: {{@$info->founded_at}} I EIIN: {{@$info->eiin_no}} I {{@$getintouch->address}}</p>
            @endif
        </div>
        <div class="logo ml-auto">
            <a href="{{url('/')}}"><img src="{{asset('theme3/img/mujib100.jpg')}}" alt=""
                    style="width: 130px; margin-right: 10px;" /></a>
            <a href="{{url('/')}}"><img src="{{asset('theme3/img/subno50.jpg')}}" alt=""
                    style="width: 130px; margin-right: 40px;" /></a>
        </div>
    </div>
    <div class="wrap bgmenu">
        <div class="container-fluid forbg">
            <nav id="section_control" class="navbar navbar-expand-lg">

                <!--menu part-->
                <button class="navbar-toggler  btnstyle" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </span>
                </button>

                @php

                $menu =
                App\Models\Menu::where('name','home-menu')->where('institute_id',Helper::getInstituteId())->first();
                if($menu){
                $menuItems =
                App\Models\MenuItem::with('childs')->where('menu_id',$menu->id)->whereNull('parent_id')->where('institute_id',Helper::getInstituteId())->get();
                }
                // echo $menuItems;
                @endphp
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav menuspc text-center">

                        @if(isset($menuItems))
                        @foreach ($menuItems as $menu)
                            @if ($menu->childs->count() > 0)
                                <li class="dropdown">
                                    <a class="dropdown-toggle translate" data-toggle="dropdown" href="{{$menu->url}}">{{$menu->title}}</a>
                                    <div class="dropdown-menu cust-drop text-left">
                                        @foreach ($menu->childs as $item)
                                            <a href="{{url($item->url)}}">{{$item->title}}</a><br>
                                        @endforeach
                                    </div>
                                </li>
                            @else
                                <li class="order2">
                                    <a href="{{$menu->url}}" class="translate">
                                      
                                      {{$menu->title}}
                                    </a>
                                  </li>
                            @endif
                        @endforeach
                    @endif

                        <li class="ml-auto">
                            @if (Auth::guard('student')->check())
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="javascript:void(0)" id="logoutbtn">
                                <div class="trinagle"></div>
                                <p>Logout</p>
                            </a>
                            <a href="{{url('/student-portal')}}">
                                <div class="trinagle"></div>
                                <p>Student Portal</p>
                            </a>
                            @elseif(Auth::guard('teacher')->check())
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="javascript:void(0)" id="logoutbtn">
                                <div class="trinagle"></div>
                                <p>Logout</p>
                            </a>
                            <a href="{{url('/teacherpanel')}}">
                                <div class="trinagle"></div>
                                <p>Teacher Portal</p>
                            </a>

                            @elseif(Auth::user())
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a href="javascript:void(0)" id="logoutbtn">
                                <div class="trinagle"></div>
                                <p>Logout</p>
                            </a>
                            <a href="{{route('home')}}">
                                <div class="trinagle"></div>
                                <p>Dashboard</p>
                            </a>
                            @else
                            <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#studentLogin"
                                class="studentLoginBtn">
                                <div class="trinagle"></div>
                                <p>Students</p>
                            </a>
                            <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#teachersLogin"
                                class="teacherLoginBtn">
                                <div class="trinagle"></div>
                                <p>Teachers</p>
                            </a>
                            @endif

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--bottom-menuu----->

    <!--banner--part------->

    <div class="wrap bgbanner ">
        <div class="container">
            <div class="row topmar_gin">
                <div class="col-lg-5 formagin">
                    <h4>আসসালামু আলাইকুম</h4>
                    <div class="cover_welcome">
                        <img src="{{asset('theme3/img/border.png')}}" alt="" />
                        <h2>WELCOME TO</h2>
                    </div>
                    <div class="cd-intro">
                        <h1 class="cd-headline slide">
                            <span class="cd-words-wrapper" style="width: 100%">

                                <b class="is-visible">
                                    <div class="trinagle"></div>
                                    <span class="schoolname"> {{@$info->name}} </span>
                                    <div class="trinagle1"></div>
                                </b>
                            </span>
                        </h1>
                    </div>
                    <div class="segment_title">
                        <p>IN THE SEGMENT OF : <span class="typed"></span></p>
                    </div>
                </div>
                <div class="col-lg-7 text-center slider_imagecover">
                    <div id="testimonial-slider" class="owl-carousel">

                        @if (@$banners)
                        @foreach ($banners as $banner)
                        <div class="testimonial">
                            <img src="{{ Config::get('app.s3_url').$banner->image }}" class="img1" alt="" />
                        </div>
                        @endforeach
                        @endif
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</header>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Menu PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->





@php
$newses = App\Models\News::all();
@endphp
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Marquee PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->



<!-- student modal starts here -->
<div class="modal fade" id="studentLogin">
    <div class="modal-dialog" id="modal-dialog" role="document">
        <div class="modal-content relative">

            <button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div id="all-wrapper" style="gap: 40px" class="d-flex justify-content-between align-items-center">
                    <div class="img-wrapper" style="margin-top: -33px;">
                        <div class="row mb-2">
                            <div class="col-3 text-left">
                                @if($info)
                                <img style="max-width: 70px;" src="{{asset('uploads/schoolInfo/'.$info->logo)}}" alt="">
                                @endif
                            </div>
                            <div class="col-12 text-left px-1 pt-3">
                                <h6> <strong>{{@$info->name}}</strong></h6>
                            </div>
                        </div>
                        @if($info)
                        <img class="teacher-img" style="max-width:300px"
                            src="{{asset('uploads/schoolInfo/'.$info->school_photo)}}" />
                        @endif
                    </div>
                    <div class="w-100" id="form-box">
                        <div>
                            <h5 class="modal-title py-2" id="exampleModalLabel">
                                Student Login
                            </h5>
                        </div>
                        <form class="form" action="{{ route('student.login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-1">
                                <input type="text" name="id_no" class="form-control" placeholder="Enter Student Id" />
                            </div>
                            <div class="form-group mb-1">
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                            <div>
                                <button id="login-btn" type="submit" class="btn btn-success">
                                    Login
                                </button>
                            </div>
                            <div class="forgot">
                                <a href="#">Forgot password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- student modal ends here -->


<!-- teacher modal starts here teacherLoginModal -->

<div class="modal fade" id="teachersLogin">
    <div class="modal-dialog" id="modal-dialog" role="document">
        <div class="modal-content relative">

            <button type="button" class="close teacherclose absolute" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div id="all-wrapper" style="gap: 40px" class="d-flex justify-content-between align-items-center">
                    <div class="img-wrapper" style="margin-top: -33px;">
                        <div class="row mb-2">
                            <div class="col-3 text-left">
                                @if($info)
                                <img style="max-width: 70px;" src="{{asset('uploads/schoolInfo/'.$info->logo)}}" alt="">
                                @endif
                            </div>
                            <div class="col-9 text-left px-1 pt-3">
                                <h6> <strong>{{@$info->name}}</strong></h6>
                            </div>

                        </div>
                        @if($info)
                        <img class="teacher-img" style="max-width:300px;"
                            src="{{$info->logo === 'default.png' ? Helper::default_image() : asset('uploads/schoolInfo/'.$info->school_photo)}}" />
                        @endif
                    </div>
                    <div class="w-100" id="form-box">
                        <div>
                            <h5 class="modal-title py-2" id="exampleModalLabel">
                                Teacher Login
                            </h5>
                        </div>
                        <form class="form" action="{{ route('teacher.login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-1">
                                <input type="text" name="id_no" class="form-control" placeholder="Enter Teacher Id" />
                            </div>
                            <div class="form-group mb-1">
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                            <div>
                                <button id="login-btn" type="submit" class="btn btn-success">
                                    Login
                                </button>
                            </div>
                            <div class="forgot">
                                <a href="#">Forgot password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
