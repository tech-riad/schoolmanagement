@php
$info = App\Models\SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
$getintouch = App\Models\Getintouch::where('institute_id',Helper::getInstituteId())->first();

@endphp

<footer>
    <div class="wrap bgfoot_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 sf1 mt-4 mt-md-0">
                    <ul>
                        <li><a href="#">ABOUT US</a></li>
                        <li><a href="#">OUR VISION</a></li>
                        <li><a href="#">HISTORY</a></li>
                        <li><a href="#">FEES</a></li>
                    </ul>
                </div>
                <div class="col-md-4 sf2 mt-4 mt-md-0">
                    <a href="font/avg/card.html" target="_blank">
                        <p>THIS SITES DESIGNERS & DEVELOPERS</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap bgfoot_bottom">
        <div class="container">
            <p>
                Created with love by
                <a href="https://www.le-codesign.com/" target="_blank" class="team1"> XPERTX</a>.
            </p>
            <p>
                © Copyright 2023 Xpertx All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
<!--/*Go to top--------*/-->

@include('frontent.theme3.layouts.expired-modal')


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
START Back to top PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
