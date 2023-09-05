{{-- <div class="preloader">
    <div class="loader rubix-cube">
        <div class="layer layer-1"></div>
        <div class="layer layer-2"></div>
        <div class="layer layer-3 color-1"></div>
        <div class="layer layer-4"></div>
        <div class="layer layer-5"></div>
        <div class="layer layer-6"></div>
        <div class="layer layer-7"></div>
        <div class="layer layer-8"></div>
    </div>
</div> --}}


@php
// echo Helper::getInstituteId();
$info = App\Models\SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
$getintouch = App\Models\Getintouch::where('institute_id',Helper::getInstituteId())->first();
$sociallink = App\Models\Sociallink::where('institute_id',Helper::getInstituteId())->get();


// dd($FrontSection);
$header = $FrontSection->where('name', 'Header')->first();


@endphp

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Header PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

<header id="header-part">
       
    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact text-lg-left text-center">
                        <ul>
                            @if($info)  
                        <li><img src="{{asset('theme2/images/all-icon/map.png')}}" alt="icon"><span style="color:{{ @$header->color->color }};"> East: {{@$info->founded_at}} I EIIN: {{@$info->eiin_no}} I {{@$getintouch->address}}</span></li>
                        @endif
                    </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-opening-time text-lg-right text-center">
                        <p>Opening Hours : Monday to Saturay - 8 Am to 5 Pm</p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->
    
    <div class="header-logo-support pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <a href="{{Route('index')}}">
                        <div class="Logo d-flex">
                            <div class="img">
                                @if($info)
                                <img height="100px" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="">
                                @endif
                            </div>
    
                            <div class="text">
                                <h3 >{{@$info->name}}</h3>
                                @if($info)
                                <h4 >East: {{@$info->founded_at}} I EIIN: {{@$info->eiin_no}} I {{@$getintouch->address}}</h4>
                                 @endif
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="support-button float-right d-none d-md-block">
                        <div class="support float-left">
                            <div class="icon">
                                <img src="{{asset('theme2/images/all-icon/support.png')}}" alt="icon">
                            </div>
                            <div class="cont">
                                <p>Need Help? call us free</p>
                                <span><a href="tel:{{@$getintouch->phone}}"><i class="fas fa-phone-alt"></i> {{@$getintouch->phone}}</a></span>
                            </div>
                        </div>
                        <div class="button float-left">
                            @if (Auth::guard('student')->check())
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="javascript:void(0)" id="logoutbtn" class="main-btn">Logout</a>
                            <a href="{{url('/student-portal')}}" class="main-btn">Student Portal</a>
                            @elseif(Auth::guard('teacher')->check())
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="javascript:void(0)" id="logoutbtn" class="main-btn">Logout</a>
                            <a href="{{url('/teacherpanel')}}" class="main-btn">Teacher Portal</a>
                            @elseif(Auth::user())
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="javascript:void(0)" id="logoutbtn"  class="main-btn">Logout</a>
                            <a href="{{route('home')}}" class="main-btn">Dashboard</a>
                            @else
                            <a href="javascript:void(0)" class="studentLoginBtn main-btn" >Students</a>
                            <a href="javascript:void(0)" class="teacherLoginBtn main-btn">Teachers</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header logo support -->
    
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        @php

                        $menu = App\Models\Menu::where('name','home-menu')->where('institute_id',Helper::getInstituteId())->first();
                        if($menu){
                            $menuItems = App\Models\MenuItem::with('childs')->where('menu_id',$menu->id)->whereNull('parent_id')->where('institute_id',Helper::getInstituteId())->get();
                        }
                        // echo $menuItems;
                        @endphp

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                @if(isset($menuItems))
                            @foreach ($menuItems as $menu)
                            <li class="nav-item">
                                <a class="{{Request::is('index') ? 'active' : ''}}" href="{{$menu->url}}">{{$menu->title}}</a>
                                @if ($menu->childs->count() > 0)
                                    <ul class="sub-menu">
                                        @foreach ($menu->childs as $item)
                                        <li>
                                            <a href="{{url($item->url)}}">{{$item->title}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                            @endif
                                {{-- <li class="nav-item">
                                    <a class="active" href="index-2.html">Home</a>
                                    <ul class="sub-menu">
                                        <li><a class="active" href="index-2.html">Home 01</a></li>
                                        <li><a href="index-3.html">Home 02</a></li>
                                        <li><a href="index-4.html">Home 03</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                    <div class="right-icon text-right">
                        <ul>
                            <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                        </ul>
                    </div> <!-- right icon -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
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
    <div class="modal fade studentLoginModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <img class="teacher-img" style="max-width:300px" src="{{asset('uploads/schoolInfo/'.$info->school_photo)}}" />
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

    <div class="modal fade teacherLoginModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <img class="teacher-img" style="max-width:300px;" src="{{$info->logo === 'default.png' ? Helper::default_image() : asset('uploads/schoolInfo/'.$info->school_photo)}}" />
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