<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$info->name ?? ''}}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- font-family: 'Karla', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FONT LINK -->
    <!-- font-family: 'Open Sans', sans-serif; -->
    <link rel="stylesheet" href="{{asset('theme2/css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/animate.css')}}">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/nice-select.css')}}">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/magnific-popup.css')}}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/bootstrap.min.css')}}">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/font-awesome.min.css')}}">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/default.css')}}">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/style.css')}}">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('theme2/css/responsive.css')}}">
    @include('frontent.theme1.layouts.dynamiccss')
    <style>
        /* .modal-dialog {
          width: 500px;
        } */
    </style>
    @yield('style')

</head>

<body>
@include('frontent.theme2.layouts.header')



<!-- Preloader -->


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Banner PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@yield('content')

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@include('frontent.theme2.layouts.footer')

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- JS Link -->
    <script src="{{asset('theme2/js/vendor/modernizr-3.6.0.min.js')}}"></script>

    <script src="{{asset('theme2/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('theme2/js/bootstrap.min.js')}}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{asset('theme2/js/slick.min.js')}}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('theme2/js/jquery.magnific-popup.min.js')}}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{asset('theme2/js/waypoints.min.js')}}"></script>
    <script src="{{asset('theme2/js/jquery.counterup.min.js')}}"></script>
    
    <!--====== Nice Select js ======-->
    <script src="{{asset('theme2/js/jquery.nice-select.min.js')}}"></script>
    
    <!--====== Nice Number js ======-->
    <script src="{{asset('theme2/js/jquery.nice-number.min.js')}}"></script>
    
    <!--====== Count Down js ======-->
    <script src="{{asset('theme2/js/jquery.countdown.min.js')}}"></script>
    
    <!--====== Validator js ======-->
    <script src="{{asset('theme2/js/validator.min.js')}}"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{asset('theme2/js/ajax-contact.js')}}"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('theme2/js/main.js')}}"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{asset('theme2/js/map-script.js')}}"></script>
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
