@extends('frontent.theme4.layouts.web')

@section('content')

<div id="contents" class="sixteen columns">
    <div class="twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="row" id="notice-board">
                <div class="notice-board-bg">
                    <h2>নোটিশ বোর্ড</h2>
                    <div id="notice-board-ticker">
                        <ul>
                            @foreach ($notices as $item)
                            <li>
                                <a
                                    href="{{ route('web.noticeShow', $item->id) }}">{!! $item->title !!}</a> </li>
                            <li>
                            @endforeach
                        </ul>
                        <a class="btn right" href="site/view/notices.html">সকল</a>
                    </div>
                </div>
            </div>
            <style>
                #notice-board-ticker ul li {
                    list-style: none;
                }
            </style>
            <script></script>
            <div style=" background-color: #EFEFEF;border: 1px solid #CCCCCC;margin-bottom: 20px;padding: 10px;"
                class="row" id="news">
                <h5 style="float:left;margin:-3px 5px 0 0; font-weight:bold;font-size:.9em">খবর:</h5>
                <div id="news-ticker" style="overflow: hidden; position: relative; height: 0px;">
                    <ul style="font-size: 0.9em; position: absolute; margin: 0px; padding: 0px; width: 95%;">
                        <li class="lineheight"><a
                                href="site/news/4b812e79-fcfd-464f-b28b-0a2ff8f13036/%e0%a6%ac%e0%a7%87%e0%a6%95%e0%a6%be%e0%a6%b0%e0%a6%a4%e0%a7%8d%e0%a6%ac-%e0%a6%95%e0%a6%ae%e0%a6%be%e0%a6%a4%e0%a7%87-%e0%a6%b8%e0%a7%81%e0%a6%a6%e0%a6%95%e0%a7%8d%e0%a6%b7-%e0%a6%93-%e0%a6%95%e0%a6%b0%e0%a7%8d%e0%a6%ae%e0%a6%a0-%e0%a6%95%e0%a6%b0%e0%a7%8d%e0%a6%ae%e0%a6%b8%e0%a7%81%e0%a6%9a%e0%a6%bf-%e0%a6%9a%e0%a6%be%e0%a6%b2%e0%a7%81-%e0%a6%95%e0%a6%b0%e0%a6%be-%e0%a6%b9%e0%a6%ac%e0%a7%87---%e0%a6%ae%e0%a6%be%e0%a6%a8%e0%a6%a8%e0%a7%80%e0%a7%9f-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%89%e0%a6%aa%e0%a6%ae%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a7%8d%e0%a6%b0%e0%a7%80-%e0%a6%ae%e0%a6%b9%e0%a6%bf%e0%a6%ac%e0%a7%81%e0%a6%b2-%e0%a6%b9%e0%a6%be%e0%a6%b8%e0%a6%be%e0%a6%a8-%e0%a6%9a%e0%a7%8c%e0%a6%a7%e0%a7%81%e0%a6%b0%e0%a7%80.html">বেকারত্ব
                                কমাতে সুদক্ষ ও কর্মঠ কর্মসুচি চালু করা হবে - মাননীয় শিক্ষা উপমন্ত্রী মহিবুল
                                হাসান চৌধুরী</a>
                            <i>(&#x09E8;&#x09E6;&#x09E7;&#x09EF;-&#x09E6;&#x09EF;-&#x09E8;&#x09EB;)</i></li>
                        <li class="lineheight"><a
                                href="site/news/c8e3aef6-ef0c-4062-b634-8e75677faca3/%e0%a6%aa%e0%a6%b0%e0%a7%8d%e0%a6%af%e0%a6%be%e0%a7%9f%e0%a6%95%e0%a7%8d%e0%a6%b0%e0%a6%ae%e0%a7%87--%e0%a6%b8%e0%a6%95%e0%a6%b2-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%ac%e0%a7%8d%e0%a6%af%e0%a6%ac%e0%a6%b8%e0%a7%8d%e0%a6%a5%e0%a6%be%e0%a6%95%e0%a7%87-%e0%a6%9c%e0%a6%be%e0%a6%a4%e0%a7%80%e0%a7%9f%e0%a6%95%e0%a6%b0%e0%a6%a3-%e0%a6%95%e0%a6%b0%e0%a6%be-%e0%a6%b9%e0%a6%ac%e0%a7%87---%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%89%e0%a6%aa%e0%a6%ae%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a7%8d%e0%a6%b0%e0%a7%80-%e0%a6%ae%e0%a6%b9%e0%a6%bf%e0%a6%ac%e0%a7%81%e0%a6%b2-%e0%a6%b9%e0%a6%be%e0%a6%b8%e0%a6%be%e0%a6%a8-%e0%a6%9a%e0%a7%8c%e0%a6%a7%e0%a7%81%e0%a6%b0%e0%a7%80--.html">পর্যায়ক্রমে
                                সকল শিক্ষা ব্যবস্থাকে জাতীয়করণ করা হবে - শিক্ষা উপমন্ত্রী মহিবুল হাসান চৌধুরী
                            </a> <i>(&#x09E8;&#x09E6;&#x09E7;&#x09EF;-&#x09E6;&#x09EF;-&#x09E7;&#x09EF;)</i>
                        </li>
                        <li class="lineheight"><a
                                href="site/news/9b39a022-8088-45d8-96a6-a23ecc98dd5e/%e0%a6%ac%e0%a6%be%e0%a6%82%e0%a6%b2%e0%a6%be%e0%a6%a6%e0%a7%87%e0%a6%b6-%e0%a6%a4%e0%a6%a5%e0%a6%be-%e0%a6%ac%e0%a6%bf%e0%a6%b6%e0%a7%8d%e0%a6%ac-%e0%a6%b6%e0%a6%be%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a6%bf-%e0%a6%aa%e0%a7%8d%e0%a6%b0%e0%a6%a4%e0%a6%bf%e0%a6%b7%e0%a7%8d%e0%a6%a0%e0%a6%be%e0%a7%9f-%e0%a6%86%e0%a6%97%e0%a6%be%e0%a6%ae%e0%a7%80-%e0%a6%a6%e0%a6%bf%e0%a6%a8%e0%a7%87-%e0%a6%ad%e0%a7%81%e0%a6%ae%e0%a6%bf%e0%a6%95%e0%a6%be-%e0%a6%b0%e0%a6%be%e0%a6%96%e0%a6%ac%e0%a7%87-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be%e0%a6%b0%e0%a7%8d%e0%a6%a5%e0%a7%80%e0%a6%b0%e0%a6%be---%e0%a6%ae%e0%a6%be%e0%a6%a8%e0%a6%a8%e0%a7%80%e0%a7%9f-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%89%e0%a6%aa%e0%a6%ae%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a7%8d%e0%a6%b0%e0%a7%80-%e0%a6%ae%e0%a6%b9%e0%a6%bf%e0%a6%ac%e0%a7%81%e0%a6%b2-%e0%a6%b9%e0%a6%be%e0%a6%b8%e0%a6%be%e0%a6%a8-%e0%a6%9a%e0%a7%8c%e0%a6%a7%e0%a7%81%e0%a6%b0%e0%a7%80--.html">বাংলাদেশ
                                তথা বিশ্ব শান্তি প্রতিষ্ঠায় আগামী দিনে ভুমিকা রাখবে শিক্ষার্থীরা - মাননীয়
                                শিক্ষা উপমন্ত্রী মহিবুল হাসান চৌধুরী </a>
                            <i>(&#x09E8;&#x09E6;&#x09E7;&#x09EF;-&#x09E6;&#x09EF;-&#x09E7;&#x09EB;)</i></li>
                    </ul>
                    <div style="float:right">
                        <a class="btn" href="site/view/news.html">সকল</a>
                    </div>
                </div>
            </div>
            <style>
                .lineheight {
                    line-height: 22px;
                }
            </style>
            <script></script>
            <div class="column block">
                <h5 class="bk-org title">
                    ভিডিও গ্যালারী </h5>

                <table align="left" border="2" cellpadding="2" cellspacing="2" style="width:400px">
                    <tbody>
                        
                        @foreach ($videos->chunk(2) as $video)
                        <tr>
                            @foreach ($video as $item)
                            
                            <td>
                                {{-- <p><strong>{{ $video->date }}</strong></p> --}}

                                @if(@$item->type == 'youtube')


                                <p><iframe height="250"  src="https://www.youtube.com/embed/{{$item->code}}"
                                    title="{{ $item->title }}" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe></p>
                                @else

                                <p><iframe src="https://player.vimeo.com/video/{{$item->code}}?h=a0ad2b66b3" height="250" 
                                     allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></p>
                                @endif
                            </td>
                                
                            @endforeach
                            
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>

                <p>&nbsp;</p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
                <p>
                </p>
            </div>
            <style>
                #right-content .block {
                    display: block !important
                }
            </style>
            <script></script>
            
           
            
            
            <link rel="stylesheet" type="text/css"
                href="{{asset('theme4/themes/responsive_npf/js/ad_slider/jquery.ad-gallery.css')}}">

            <script type="text/javascript" src="{{asset('theme4/themes/responsive_npf/js/ad_slider/jquery.ad-gallery.js')}}">
            </script>

            <script type="text/javascript">
                $(function () {
                    var galleries = $('.ad-gallery').adGallery({
                        width: '100%'
                    });
                });
            </script>
            <style>
                .ad-description-title {
                    background-color: #f5f5f5;
                    padding: 3px;
                    opacity: .8
                }
            </style>


            <div id="gallery" class="ad-gallery">
                <div class="ad-image-wrapper">
                    <div class="ad-image" style="width:100%">
                    </div>

                    <img class="ad-loader" src="loader.html" style="display: none;">

                    <div class="ad-next" style="height: 295px;">
                        <div class="ad-next-image" style="opacity: 0.7; display: none;"></div>
                    </div>
                    <div class="ad-prev" style="height: 295px;">
                        <div class="ad-prev-image" style="opacity: 0.7; display: none;"></div>
                    </div>
                </div>
                <div class="ad-controls"></div>
                <div class="ad-nav">
                    <div class="ad-back" style="opacity: 0.6;"></div>
                    <div class="ad-thumbs">
                        <ul class="ad-thumb-list" style="width: 1665px;">



                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/2fa5349c_dbcc_43c0_8865_75fb5b57aefd/wer.jpg"
                                    class="">
                                    <img src="{{asset('theme4/sites/default/files/files/shed.portal.gov.bd/top_banner/10eca01a_7a78_4b53_b899_597fd3ceb1e9/e555555.jpg')}}"
                                        title="মাধ্যমিক ও উচ্চ শিক্ষা বিভাগের নব নিযুক্ত সচিব জনাব সোলেমান খান জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমান এঁর প্রতিকৃতিতে শ্রদ্ধাঞ্জলি প্রদান করেন।  (০৪ জানুয়ারি, ২০২৩) "
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/9d6a185f_98f6_4c19_b2b7_c1dad599983a/wb.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/9d6a185f_98f6_4c19_b2b7_c1dad599983a/wb.jpg"
                                        title="নব নিযুক্ত মন্ত্রিপরিষদ সচিব জনাব মোঃ মাহবুব হোসেন মহোদয়কে অভিনন্দন ও শুভেচ্ছা প্রদান করেন জনাব সোলেমান খান, সচিব, মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ, শিক্ষা মন্ত্রণালয়।  (০৪ জানুয়ারি, ২০২৩) "
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/5fbf5e21_a415_4da1_ab30_025daab35b96/IMG_9217.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/5fbf5e21_a415_4da1_ab30_025daab35b96/IMG_9217.jpg"
                                        title="জনাব সোলেমান খান, সচিব, মাধ্যমিক ও উচ্চ শিক্ষা বিভাগে ০২ জানুয়ারি,  ২০২৩ তারিখ যোগদান উপলক্ষে সংবর্ধনা অনুষ্ঠান"
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/650d8b33_8d6c_45b0_8d67_17db34647e2c/13.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/650d8b33_8d6c_45b0_8d67_17db34647e2c/13.jpg"
                                        title="মাননীয় প্রধানমন্ত্রী শেখ হাসিনা কে ঢাকায় আন্তর্জাতিক মাতৃভাষা ইনস্টিটিউট মিলনায়তনে মহান শহিদ দিবস ও আন্তর্জাতিক মাতৃভাষা দিবস ২০২৩ উপলক্ষ্যে আয়োজিত অনুষ্ঠানে বাংলাদেশসহ বিভিন্ন দেশের শিশুরা তাদের নিজ নিজ ভাষায় শুভেচ্ছা জানান।"
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/a0691178_3a9f_4b40_8fce_364c57e02042/15.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/a0691178_3a9f_4b40_8fce_364c57e02042/15.jpg"
                                        title="মাননীয় প্রধানমন্ত্রী শেখ হাসিনা মহান শহিদ দিবস ও আন্তর্জাতিক মাতৃভাষা দিবস ২০২৩ উপলক্ষ্যে ঢাকায় আন্তর্জাতিক মাতৃভাষা ইনস্টিটিউট ভাষা জাদুঘরের উদ্বোধন শেষে পরিদর্শন করেন।"
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/fe6cf562_a54d_419a_8f05_728ec28cccfc/8.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/fe6cf562_a54d_419a_8f05_728ec28cccfc/8.jpg"
                                        title="মাননীয় প্রধানমন্ত্রী শেখ হাসিনা ঢাকায় আন্তর্জাতিক মাতৃভাষা ইনস্টিটিউটে মহান শহিদ দিবস ও আন্তর্জাতিক মাতৃভাষা দিবস ২০২৩ উপলক্ষ্যে আয়োজিত অনুষ্ঠানে আন্তজার্তিক মাতৃভাষা জাতীয় পদক প্রদান"
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/f8026cd0_1899_4da4_938a_0e6547f2d9be/50f.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/f8026cd0_1899_4da4_938a_0e6547f2d9be/50f.jpg"
                                        title="মাননীয় প্রধানমন্ত্রী শেখ হাসিনা তাঁর কার্যালয়ে শিক্ষার্থীদের হাতে বই তুলে দিয়ে ২০২৩ শিক্ষাবর্ষের মাধ্যমিক স্তরের বিনামূল্যে পাঠ্যপুস্তক বিতরণ কার্যক্রম উদ্ধোবন করেন। "
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/63f3ecfb_3186_4ad9_b7b5_a33e6ebad12b/jpeg.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/63f3ecfb_3186_4ad9_b7b5_a33e6ebad12b/jpeg.jpg"
                                        title="মাননীয় প্রধানমন্ত্রী শেখ হাসিনা ঢাকায় আন্তর্জাতিক মাতৃভাষা ইনস্টিটিউট মিলনায়তনে মহান শহিদ দিবস ও আন্তর্জাতিক মাতৃভাষা দিবস ২০২৩ উপলক্ষ্যে আয়োজিত অনুষ্ঠানে আন্তজার্তিক মাতৃভাষা জাতীয় পদক প্রদান করেন।"
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/50261550_240d_455a_826a_ce35c5bfa729/9d586a0e8efa3f8.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/50261550_240d_455a_826a_ce35c5bfa729/9d586a0e8efa3f8.jpg"
                                        title="ফিলিপাইনের ম্যানিলার পাবলিক সার্ভিস ও ডিপ্লোমেসিতে অবদান রাখার জন্য গুসি শান্তি পুরস্কার পেয়েছেন শিক্ষামন্ত্রী ডা. দীপু মনি। তিনি এ পুরস্কারটি গণভবনে প্রধানমন্ত্রী শেখ হাসিনার হাতে তুলে দেন। "
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                            <li>
                                <a href="sites/default/files/files/shed.portal.gov.bd/home_slider/67291e21_821f_4045_af76_695fb07107ab/e.jpg"
                                    class="">
                                    <img src="sites/default/files/files/shed.portal.gov.bd/home_slider/67291e21_821f_4045_af76_695fb07107ab/e.jpg"
                                        title="মাননীয় প্রধানমন্ত্রী শেখ হাসিনা তাঁর কার্যালয়ে শিক্ষার্থীদের হাতে বই তুলে দিয়ে ২০২৩ শিক্ষাবর্ষের মাধ্যমিক স্তরের বিনামূল্যে পাঠ্যপুস্তক বিতরণ কার্যক্রম উদ্ধোবন করেন।"
                                        alt="" class="" style="opacity: 0.7;" width="100" height="60">
                                </a>
                            </li>




                        </ul>
                    </div>
                    <div class="ad-forward" style="opacity: 0.6;"></div>
                </div>
            </div>


            <br />
            <style>
                .ad-gallery .ad-info {
                    width: 200px
                }

                .ad-thumb-list {
                    list-style: none !important
                }

                .ad-gallery {
                    width: 100% !important
                }

                .ad-image {
                    width: 100% !important;
                    top: 0px !important;
                    height: 432px !important
                }

                .ad-image img {
                    width: 100% !important;
                    height: 432px !important
                }

                .ad-image .ad-image-description {
                    width: 100% !important
                }


                .ad-gallery .ad-image-wrapper {
                    height: 432px;
                }

                .ad-thumbs {
                    height: 70px
                }

                .bitac-portal-gov-bd .ad-gallery .ad-image-wrapper {
                    height: 300px;
                }

                .bitac-portal-gov-bd .ad-image {
                    height: 100% !important
                }

                .bitac-portal-gov-bd .ad-image img {
                    height: 100% !important
                }

                .ad-image-description p span {
                    display: none
                }

                .ad-preloads {
                    /* position: absolute; */
                    /* left: -9000px; */
                    /* top: -9000px; */
                }

                .ad-image>p>span {
                    display: none
                }


                @media only screen and (min-width:320px) and (max-width:959px) {
                    .ad-image img {
                        height: unset;
                    }

                    .ad-gallery .ad-image-wrapper {
                        /*height: 240px;*/
                    }
                }
            </style>
            <script></script>
            <div class="column block">
                <h5 class="bk-org title">
                    মাধ্যমিক ও উচ্চ শিক্ষা বিভাগের অবস্থান </h5>

                <p>&nbsp;</p>

                <p><iframe frameborder="0" height="250"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14606.811117937137!2d90.37441860000003!3d23.75797610000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf5503de42ab%3A0x1f4f7d0b6e90a3be!2sAsad%20Gate!5e0!3m2!1sen!2sbd!4v1681028093237!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        style="border:0" width="720"></iframe></p>
                <p>
                    <a href="#" class="btn"
                        style="display:block;text-align:center;width:100%;">বিস্তারিত</a>
                </p>
            </div>
            <style>
                #right-content .block {
                    display: block !important
                }
            </style>
            <script></script>
        </div>
    </div>
    <div class="four columns right-side-bar" id="right-content">
        @foreach ($messages as $item)
        <div class="column block">
            <h5 class="bk-org title">
                {{@$item->messager_designation}}</h5>

            <p style="text-align:center">@if ($item->image === 'default.png')
                <div class="cover_img">
                    <img src="{{ Helper::default_image() }}" height="220px" alt="" />
                </div>
                @else
                <div class="cover_img">
                    <img src="{{ asset('uploads/messages/'.$item->image) }}" height="220px" alt="" />
                </div>
                @endif</p>

            <p style="text-align:center"><strong><span style="font-size:20px"><span style="font-size:22px">{{@$item->messager_name}}</span><span
                        style="font-size:16px">&nbsp;</span></strong></p>

            <p style="text-align:center">&nbsp;</p>
            <p>
                <a href="{{ route('web.messages',$item->id) }}" class="btn"
                    style="display:block;text-align:center;width:100%;">বিস্তারিত</a>
            </p>
        </div>
        <style>
            #right-content .block {
                display: block !important
            }
        </style>
        <script></script>
        @endforeach
        
        <div class="column block">
            <h5 class="bk-org title">
                একনজরে প্রতিষ্ঠান সম্পর্কে  </h5>

            <ul>
                {!! @$ataglance->content ?? '' !!}
            </ul>
            <p>
            </p>
        </div>
        <style>
            #right-content .block {
                display: block !important
            }
        </style>
        <script></script>
        <link rel="stylesheet" href="../code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="../code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <div class="column block">
            <h5 class="bk-org title">ইভেন্ট ক্যালেন্ডার
            </h5>

            @foreach ($events as $item)
            <ul>
                <li>
                    <h4>{{ date('M', strtotime($item->event_date)) }}
                        <span>{{ date('d', strtotime($item->event_date)) }}</span>
                    </h4>
                    <a href="{{ route('web.eventShow', $item->id) }}">{{ $item->title }}</a>
                </li>
            </ul>
            @endforeach
            <div class="clearfix"></div>
            <div id="datepicker"></div>
        </div>
        <style>
            .ui-widget {
                font-size: 12px;
            }

            .ui-datepicker {
                width: 97%;
            }

            td {
                padding: 3px !important;
            }

            .ui-state-default,
            .ui-widget-content .ui-state-default,
            .ui-widget-header .ui-state-default {
                text-align: center;
            }

            .css-class-to-highlight {
                background: orange !important;
            }
        </style>
        <script></script>
       
        
    </div>
</div>
    
@endsection