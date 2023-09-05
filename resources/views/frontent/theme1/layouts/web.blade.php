<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$info->name ?? ''}}</title>

    <!-- FONT LINK -->
    <!-- font-family: 'Open Sans', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- font-family: 'Karla', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Link -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/venobox.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/plugins/fancybox/fancybox.css')}}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('login_modal_assets/modal.css')}}"/>
    @include('frontent.theme1.layouts.dynamiccss')
    <style>
        /* .modal-dialog {
          width: 500px;
        } */
    </style>
    @yield('style')

</head>

<body>
@include('frontent.theme1.layouts.header')


<!-- Preloader -->


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Banner PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@yield('content')

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@include('frontent.theme1.layouts.footer')

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- JS Link -->
    <script src="{{asset('frontend_assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset('frontend_assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/all.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/venobox.min.js')}}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend_assets/js/custom.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('frontend_assets/plugins/fancybox/fancybox.js')}}"></script>
    <!--Notification-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    }
    @endif

    </script>
    <script>
        AOS.init();
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
