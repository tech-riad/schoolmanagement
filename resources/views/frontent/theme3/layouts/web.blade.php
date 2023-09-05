<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta property="og:image" content="img/fav.png" />
    <meta
      property="og:title"
      content="Tamirul Millat Kamil Madrasah,Tongi Branch"
    />
    <meta
      property="og:description"
      content="‘তা’মীরুল মিল্লাত ট্রাস্ট’ পরিচালিত তা’মীরুল মিল্লাত কামিল মাদ্রাসা একটি দ্বীনি শিক্ষা প্রতিষ্ঠান। দেশের দ্বিমুখী শিক্ষা ব্যবস্থার প্রেক্ষাপটে ইসলামী ও আধুনিক শিক্ষার বাস্তব সমন্বয় সাধন করে ইসলামী আদর্শের বুনিয়াদে এই প্রতিষ্ঠান গড়ে তোলা হয়েছে। ইসলামী জীবনদর্শন, সংস্কৃতি, ঐতিহ্য, মূল্যবোধ, অর্থনীতি, রাজনীতি ও সমাজনীতি ইত্যাতি ক্ষেত্রে মুসলিম সন্তানদেরকে আদর্শ নাগরিক রূপে গড়ে তোলা, বিশেষ করে নৈতিক অবক্ষয় থেকে তরুন সমাজকে রক্ষা করে চারিত্রিক উৎকর্ষ ও মূল্যবোধ  তৈরীর বাস্তব উদ্যোগই হচ্ছে- ‘‘তা’মীরুল মিল্লাত কামিল মাদ্রাসা’’।"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{$info->name ?? ''}}</title>



    <!-- font-family: 'Karla', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FONT LINK -->
    <!-- font-family: 'Open Sans', sans-serif; -->

    <!--====== Animate css ======-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="{{asset('theme3/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
    <script src="{{asset('theme3/ajax/libs/popper_js/1.14.7/umd/popper.min.js')}}"></script>
    <script src="{{asset('theme3/bootstrap/4.3.1/js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{asset('theme3/bootstrap/4.3.1/css/bootstrap.min.css')}}"></script> --}}
    <!--css-file---->
    <link rel="stylesheet" href="{{asset('theme3/bootstrap/4.3.1/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/owl1.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/owl2.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/style.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/font.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/simplebar.css')}}" />
    <link rel="stylesheet" href="{{asset('theme3/css/slidetype.css')}}" />
    <link rel="icon" href="{{asset('theme3/img/fav.png')}}" />
    
    <!--====== Responsive css ======-->
    @include('frontent.theme3.layouts.dynamiccss')
    <style>
        /* .modal-dialog {
          width: 500px;
        } */
    </style>
    @yield('style')

</head>

<body>
@include('frontent.theme3.layouts.header')



<!-- Preloader -->


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Banner PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@yield('content')

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@include('frontent.theme3.layouts.footer')

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- JS Link -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-arrow-alt-circle-up"></i>
    </button>
    <!--popup--------->
    {{-- <div id="modalOverlay">
        <div class="modalPopup">
            <div class="modalContent">
                <h1>news</h1>
                <div class="cover-pop">
                    <i class="far fa-hand-point-right"> </i>
                    <p>অনলাইন সেমিনার 2৯-জানুয়ারি শুরু হবে।</p>
                </div>
                <div class="cover-pop">
                    <i class="far fa-hand-point-right"> </i>
                    <p>সাপ্তাহিক জলসা অনুষ্ঠিত হবে প্রতি বৃহস্পতিবার।</p>
                </div>
                <div class="cover-pop">
                    <i class="far fa-hand-point-right"> </i>
                    <p>রেজাল্ট প্রকাশ হবে আগামী ২৩ ফেব্রুয়ারি</p>
                </div>
                <button class="buttonStyle" id="button">Close</button>
            </div>
        </div>
    </div> --}}
    <!--popup-js-------->
    <script>
        var pops = document.querySelector(".modalPopup");
        document.getElementById("button").onclick = function () {
            document.getElementById("modalOverlay").style.display = "none";
        };
        setTimeout(function () {
            document.getElementById("modalOverlay").style.position = "fixed";
            pops.classList.add("shows");
        }, 5000);
    
    </script>
    <!--js-files----->
    <script src="{{asset('theme3/js/typed.js')}}"></script>
    <script src="{{asset('theme3/js/slim-min.js')}}"></script>
    <script src="{{asset('theme3/js/owl.js')}}"></script>
    <script src="{{asset('theme3/js/simplebar.js')}}"></script>
    <script src="{{asset('theme3/js/magnificpop.js')}}"></script>
    <script src="{{asset('theme3/js/waypoints.js')}}"></script>
    <script src="{{asset('theme3/js/jquery.countup.min.js')}}"></script>
    <script src="{{asset('theme3/js/aos.js')}}"></script>
    <script src="{{asset('theme3/js/slidetype.js')}}"></script>
    <script src="{{asset('theme3/js/cutom.js')}}"></script>
    {{-- <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{asset('theme2/js/map-script.js')}}"></script> --}}
    <!--Notification-->
    
    <script>
        AOS.init();
    </script>
    <script>
        $(document).ready(function (){
            $.get("{{route('expired-check')}}",function (data){

                if(data.expired){
                    $('#msg_head').html(data.msgHead);
                    $('#msg_body').html(data.msgBody);
                    $('#expiredModal').modal({backdrop: 'static', keyboard: false}).modal('show');
                }
            });
        });
    </script>
    <script>
        $(".studentLoginBtn").click(function(){
            $(".studentLoginModal").modal('show');
        });

        $(".close").click(function(){
            $(".studentLoginModal").modal('hide');
        });

        $(".teacherLoginBtn").click(function(){
            $(".teacherLoginModal").modal('show');
        });

        $(".close").click(function(){
            $(".teacherLoginModal").modal('hide');
        });


        $("#logoutbtn").click(function(){
            $("#logout-form").submit();
        });
    </script>
    @yield('script')
    @stack('js')
</body>

</html>
