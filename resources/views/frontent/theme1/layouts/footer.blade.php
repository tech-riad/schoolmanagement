@php
$info = App\Models\SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
$getintouch = App\Models\Getintouch::where('institute_id',Helper::getInstituteId())->first();

@endphp
<footer class="Footer section_gaps">

<div class="container">

    <div class="row">

        <!-- col-lg-8 -->
        <div class="col-lg-8 col-sm-12">

            <div class="row">

                <!-- item -->
                <div class="col-lg-4 col-sm-4">

                    <div class="FooterItem">

                        <h4>ABOUT THE SCHOOL</h4>
                        <p>{{@$info->about}}</p>

                        <a href="" class="bg">GET BROCHURE</a>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-5">

                    <div class="FooterItem">

                        <h4>প্রয়োজনীয় লিংক</h4>

                        <ul>
                            <li><a href=""><i class="fas fa-chevron-right"></i> বাংলাদেশ কারিগরি শিক্ষা বোর্ড </a></li>
                            <li><a href=""><i class="fas fa-chevron-right"></i> বাংলাদেশ মাদ্রাসা শিক্ষা বোর্ড</a></li>
                            <li><a href=""><i class="fas fa-chevron-right"></i> ঢাকা, শিক্ষা বোর্ড </a></li>
                            <li><a href=""><i class="fas fa-chevron-right"></i> চট্টগ্রাম শিক্ষা বোর্ড, </a><li>
                            <li><a href=""><i class="fas fa-chevron-right"></i> কুমিল্লা, শিক্ষা বোর্ড </a></li>

                        </ul>


                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-3">

                    <div class="FooterItem">

                        <h4>প্রয়োজনীয় লিংক</h4>

                        <ul>
                            <li><a href=""><i class="fas fa-chevron-right"></i>  রাজশাহী, শিক্ষা বোর্ড</a></li>
                            <li><a href=""><i class="fas fa-chevron-right"></i>  যশোর, শিক্ষা বোর্ড </a></li>
                            <li><a href=""><i class="fas fa-chevron-right"></i>  বরিশাল, শিক্ষা বোর্ড </a></li>
                            <li><a href=""><i class="fas fa-chevron-right"></i> সিলেট, শিক্ষা বোর্ড</a></li>
                            <li><a href=""><i class="fas fa-chevron-right"></i>  দিনাজপুর, শিক্ষা বোর্ড </a></li>
                        </ul>


                    </div>

                </div>

            </div>

        </div>

        <!-- col-lg-4 -->
        <div class="col-lg-4 col-sm-12">

            <div class="GetInTouch">

                <div class="FooterItem">

                    <h4>GET IN TOUCH</h4>

                    <ul>
                        <li><a href="tel:+88{{@$getintouch->phone}}"><i class="fas fa-phone-alt"></i> +88{{@$getintouch->phone}}</a></li>
                        <li><a href="{{@$getintouch->email}}"><i class="fas fa-envelope"></i> {{@$getintouch->email}}</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i>{{@$getintouch->address}}</a></li>
                    </ul>


                </div>

            </div>

        </div>


    </div>

</div>

</footer>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
START TinyFooter PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

<footer class="TinyFooter">

<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <div class="TinyFooter d_flex d_justify">
                <p>Developed By EDTECO</p>
                <p>Supported By Md Faisal Rashid</p>
                <p>Sponsored By ZANOVI SHOP</p>
            </div>

        </div>

    </div>

</div>

</footer>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
START Back to top PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

<a id="backToTop"><i class="fas fa-long-arrow-alt-up"></i></a>

@include('frontent.theme1.layouts.expired-modal')
