<div class="preloader">
    <img src="frontend_assets/images/preloader.gif" alt="">
</div>
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

<section id="{{@$header->name}}" style="">

    <div class="container">

        <div class="row d_flex">
            <!-- logo -->
            <div class="col-lg-5 col-sm-12">
                <a href="{{Route('index')}}">
                    <div class="Logo d_flex">
                        <div class="img">
                            @if($info)
                            <img src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="">
                            @endif
                        </div>

                        <div class="text">
                            <h3 style="color:{{ @$header->color->color }};">{{@$info->name}}</h3>
                            @if($info)
                            <h4 style="color:{{ @$header->color->color }};">East: {{@$info->founded_at}} I EIIN: {{@$info->eiin_no}} I {{@$getintouch->address}}</h4>
                        @endif
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-7 col-sm-12">

                <div class="HeaderContent">
                    <ul>
                        @if (Auth::guard('student')->check())
                            <li class="d-none">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li ><a href="javascript:void(0)" id="logoutbtn" style="color:{{ @$color->color }};">Logout</a></li>
                            <li><a href="{{url('/student-portal')}}" class="">Student Portal</a></li>
                        @elseif(Auth::guard('teacher')->check())
                            <li class="d-none">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li><a href="javascript:void(0)" id="logoutbtn">Logout</a></li>
                            <li><a href="{{url('/teacherpanel')}}" class="">Teacher Portal</a></li>
                        @elseif(Auth::user())
                            <li class="d-none">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li><a href="javascript:void(0)" id="logoutbtn" style="color:{{@$color->color}};">Logout</a></li>
                            <li><a href="{{route('home')}}" class="" style="color:{{@$color->color }};">Dashboard</a></li>
                        @else
                            <li><a href="javascript:void(0)" class="studentLoginBtn">Students</a></li>
                            <li><a href="javascript:void(0)" class="teacherLoginBtn">Teachers</a></li>
                        @endif
                        <li><a href="#" class="bg">Online Admission</a></li>
                        <li><a href="shop" class="bg bdr">Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Menu PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<nav class="Menubar">

    <div class="container">

        <div class="row d_flex">

            @php

            $menu = App\Models\Menu::where('name','home-menu')->where('institute_id',Helper::getInstituteId())->first();
            if($menu){
                $menuItems = App\Models\MenuItem::with('childs')->where('menu_id',$menu->id)->whereNull('parent_id')->where('institute_id',Helper::getInstituteId())->get();
            }
            // echo $menuItems;
            @endphp
            <!-- menu -->
            <div class="col-xl-10 col-lg-9 col-md-3 col-sm-4 col-xs-3">
                <div class="DesktopMenu">
                    <div class="Menu">
                        <ul>
                            @if(isset($menuItems))
                            @foreach ($menuItems as $menu)
                            <li>
                                <a class="active" href="{{$menu->url}}">{{$menu->title}}</a>
                                @if ($menu->childs->count() > 0)
                                    <ul class="Submenu">
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
                        </ul>
                    </div>
                </div>
                @include('frontent.theme1.layouts.menu')
            </div>

            <!-- social Icon -->
            <div class="col-xl-2 col-lg-3 col-md-9 col-sm-8 col-xs-9">
                <div class="SocialIcon d_flex">
                    @foreach ($sociallink as $item)
                    <a href="{{$item->facebook ?? ''}}" target="_blank" class="fb"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{$item->linkedin ?? ''}}" target="_blank" class="linkdin"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{$item->twitter ?? ''}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="{{$item->youtube ?? ''}}" target="_blank" class="youtube"><i class="fab fa-youtube"></i></a>
                    @endforeach


                </div>

            </div>

        </div>

    </div>

</nav>


@php
    $newses = App\Models\News::all();
@endphp
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Marquee PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Marquee">

    <!-- left -->
    <div class="left">
        <h3>Latest News</h3>
    </div>

    <!-- middle -->
    <div class="middle">
        <marquee behavior="" direction="">
            <ul>
                @foreach ($newses as $news)
                   <li><a href="">{{$news->title}}</a></li>
                @endforeach
            </ul>
        </marquee>
    </div>


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
                                <div class="form-group">
                                    <input type="text" name="id_no" class="form-control" placeholder="Enter Student Id" />
                                </div>
                                <div class="form-group">
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
                                <div class="form-group">
                                    <input type="text" name="id_no" class="form-control" placeholder="Enter Teacher Id" />
                                </div>
                                <div class="form-group">
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
    <!-- teacher modal ends here -->
</section>
