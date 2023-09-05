<div id="start-np" autofocus="autofocus" style="opacity:0;font-size:1px;position: absolute;" aria-selected="true"
    tabindex="0">Wellcome to National Portal</div>

﻿<script src="../bangladesh.gov.bd/nav/js/obd.mainf700.js?v=1.0.1"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="../bangladesh.gov.bd/nav/css/obd.main.css">

<!-- Login Modal-->
<!-- <div class="modal fade teacherLoginModal" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->

<div class="sixteen columns" style="background-color: #683091; box-shadow: 0 1px 5px #999999;height:40px;">
    <div style="display: inline-block;float: left;width: 960px;border-bottom: 4px solid #8bc643;">
        <div class="slide-panel-btns" style="width: 165px;float: left;">
            <div class="slide-panel-button" style="display: block;">
                <!-- <i class="flaticon-menu10" style="float: left"></i> -->
                <a style="color: white;height:100%;font-size:.9em;margin-top: 7px;" href="{{url('/')}}">বাংলাদেশ জাতীয়
                    তথ্য বাতায়ন</a>
            </div>
        </div>
        <div id="div-lang" style="float:left;width: 795px;height: 32px;">
            <div id="newNavigation"></div>
            <div id="div-lang-sel" style="float: right">

                <!-- <div id="search_any" style="float: left">
                             <form action="{{ route('logout') }}"
                                 style="margin-top: 5px;padding: 0;float: left;" id="logout-form">
                                 
                                 <button class="search-btn" type="submit"
                                     style="margin: 0;padding: 1px 10px">Login</button>
                             </form>
                         </div> -->


                @if (Auth::guard('student')->check())
                <div style="float: left;margin-left: 5px">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="{{url('/student-portal')}}" class="btn btn-danger" id="logoutbtn">Logout</a>
                    <a href="{{url('/student-portal')}}" class="btn btn-info">Student Portal</a>
                    <!-- <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf 
                             <input type="hidden" name="lang" id="lang" value="en" />
                                 
                             </form> -->
                </div>
                @elseif(Auth::guard('teacher')->check())
                <div style=" margin-top:15px;">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="{{url('/student-portal')}}" class="btn btn-danger" id="logoutbtn">Logout</a>
                    <a href="{{url('/student-portal')}}" class="btn btn-info">Student Portal</a>
                </div>
                @elseif(Auth::user())
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf

                </form>
                <a style="margin-top:5px;" id="logoutbtn" href="javascript:void(0)" class="btn btn-danger">Logout</a>
                <a style="margin-top:5px;" href="{{route('home')}}" class="btn btn-info">Dashboard</a>

                @else
                <a style="margin-top:5px;" href="javascript:void(0)" class="btn btn-danger">Students</a>
                <a style="margin-top:5px;" href="javascript:void(0)" class="btn btn-info">Teachers</a>

                @endif
            </div>
        </div>
    </div>
</div>

<div class="sixteen columns">
    <div class="callbacks_container" style="box-shadow: 0 1px 5px #999999;">
        <ul class="rslides" id="front-image-slider">
            @foreach (@$banners as $banner)
            <li>
                <img src="{{ Config::get('app.s3_url').$banner->image }}" alt="" width="960" height="220" />
            </li>
            @endforeach

        </ul>
        <style>
            .rslides img {
                height: 220px
            }

            .cabinet-portal-gov-bd .meganizr>li>a {
                font-size: 18px !important
            }

        </style>
        <script></script>
    </div>


    <div class="header-site-info" id="header-site-info">
        <div>
            <div id="logo">
                <a title="Home" href="index.html">
                    <img alt="Home" src="{{asset('theme4/themes/responsive_npf/img/logo/logo.png')}}">
                </a>

            </div>

            <div class="clearfix" id="site-name-wrapper">
                <span id="site-name">
                    <a title="Home" href="index.html">
                        মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ </a>
                </span>
                <span id="slogan">
                    শিক্ষা মন্ত্রণালয় </span>
            </div>
            <!-- /site-name-wrapper -->

        </div>
        <!-- /header-site-info-inner -->

    </div>

</div>


{{-- Menu --}}

@php

$menu = App\Models\Menu::where('name','home-menu')->where('institute_id',Helper::getInstituteId())->first();
if($menu){
$menuItems =
App\Models\MenuItem::with('childs')->where('menu_id',$menu->id)->whereNull('parent_id')->where('institute_id',Helper::getInstituteId())->get();
}

@endphp

<div class="sixteen columns" id="jmenu">
    <div class="sixteen columns menu">

        <a href="javascript:;" class="show-menu menu-head"> মেনু নির্বাচন করুন</a>
        <div role="navigation" id="dawgdrops">
            <ul class="meganizr mzr-slide mzr-responsive">
                <!-- Build The Menu -->
                <li class="col0 "><a title="Home" href="index.html"
                        style="background-image: url(themes/responsive_npf/img/home_dark.png);margin-top:5px;"></a>
                </li>
                @if(isset($menuItems))
                @foreach ($menuItems as $menu)
                <li class="col1 mzr-drop">
                    <a class="submenu" href="{{$menu->url}}">{{$menu->title}}</a>
                    @if ($menu->childs->count() > 0)
                    <ul class="mzr-links">
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
                {{-- 
               
                
                <li class="col1 mzr-drop"><a class="submenu" href="%5bfront%5d.html">বিভাগ সম্পর্কিত তথ্য</a>
                    <div class="mzr-content drop-three-columns">
                        <div class="one-col">
                            <h6></h6>
                            <ul class="mzr-links">
                                
                            </ul>
                        </div>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
