<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$info->name ?? ''}}</title>



    <!-- CSS Link -->
    
    <link type="text/css" rel="stylesheet" media="all"
        href="{{asset('theme4/themes/responsive_npf/stylesheets/base.css')}}" />
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('theme4/themes/responsive_npf/stylesheets/skeleton.css')}}" />
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('theme4/themes/responsive_npf/stylesheets/style.css')}}" />
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('theme4/themes/responsive_npf/stylesheets/meganizr.css')}}" />
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('theme4/npfadmin/public/css/flaticon/flaticon.css')}}" />
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('theme4/themes/responsive_npf/templates/ministry/style.css')}}" />
    <!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>-->
    <script type="text/javascript" src="../code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- include the jquery-accessibleMegaMenu plugin script -->
    <script src="{{asset('theme4/themes/responsive_npf/js/jquery-accessibleMegaMenu.js')}}"></script>


    <script>
        //jq160 = jQuery.noConflict( true );

    </script>

    <link rel="stylesheet" href="{{asset('theme4/themes/responsive_npf/stylesheets/responsiveslides.css')}}">

    <link rel="stylesheet" href="{{asset('theme4/themes/responsive_npf/templates/ministry/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('theme4/themes/responsive_npf/templates/ministry/accessibility.css')}}">
    <script src="{{asset('theme4/themes/responsive_npf/js/responsiveslides.min.js')}}"></script>
    <script src="{{asset('theme4/themes/responsive_npf/js/jquery.vticker.js')}}" type="text/javascript"></script>

    <script src="{{asset('theme4/themes/responsive_npf/js/domain_selector.js')}}" type="text/javascript"></script>
    <script src="{{asset('theme4/themes/responsive_npf/js/utils.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('theme4/themes/responsive_npf/js/yoxview/yoxview-init.js')}}"></script>


    <!-- custom accessibility start -->
    <link rel="stylesheet" href="{{asset('theme4/accessibility/css/asb.css')}}">
    <script src="{{asset('theme4/accessibility/js/asb.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    <script src="../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
    <!-- accessibility active issues -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="../maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('keyup', (event) => {
            //var name = event.key; //var code = event.code;
            if (event.code === "Tab") {
                var k = 0;
                if (event.shiftKey) {
                    //shift+tab pressed//Code // console.log(event.target);
                    var activeElement = document.activeElement;
                    if (activeElement.tagName.toLowerCase() == 'button') {
                        if (activeElement.title === 'Download Screen Reader') {
                            $('#myModalClose').attr('id', 'myModal');
                            $('#myModal').modal();
                            return false;
                        }
                    }
                } else {
                    //only tab pressed //Code
                }
            }

        });

        //====================//
        // Add event listener on keydown
        var access = 0;
        if (access === 0) {
            document.addEventListener('keyup', (event) => {
                var name = event.key;
                var code = event.code;
                var i = 0;
                if (code == "Tab" && i == 0) {
                    $('#myModal').modal();
                    i = i + 1;
                }
                // Alert the key name and key code on keydown
            });
            var accessibilitypop = document.querySelector('#accessibilitypop');

            function accessibility() {
                $('#myModal').modal('hide');
                document.getElementById("universalAccessBtn").click();
                $('#myModal').attr('id', 'myModalClose');
                //$('#accessibilityBar').attr('class', 'active');
                $('#myModal').attr('tabindex', '');
                document.getElementById("universalAccessBtn").focus();
                $('#accessibilityBar').attr('role', 'dialog');
                $('#universalAccessBtn').attr('tabindex', '1');
            };

            function accessibilitySkipToMainContent() {
                $('#myModal').attr('tabindex', '');
                $('#myModal').attr('id', 'myModalClose');
                $('#notice-board-bg').attr({
                    'aria-selected': true,
                    'tabindex': 0
                });
                //$('#skip-main-content-start-here').attr({'aria-selected': true, 'tabindex': '-1'});
                document.getElementById("skip-main-content-start-here").focus();
            }

            function accessibilitymodelClose() {
                //$('#notice-board-bg').attr('tabindex', '0');
                $('#skip-main-content-start-here').attr('tabindex', '0');
                $('#myModal').attr('tabindex', '');
                $('#myModal').attr('id', 'myModalClose');
            }

        }

        function start_np() {
            $('#start-np').attr({
                'aria-selected': true,
                'tabindex': 0
            });
            document.getElementById("start-np").focus();
        }

    </script>
    <style>
        #accessibilityBar button#universalAccessBtn {
            border-radius: 0px !important;
        }

        #accessibilityBar {
            top: 360px !important;
        }

        .btn-for-accessibility {
            font-size: 13px;
            background: local;
        }

    </style>
    <!-- end accessibility active issues -->
    <!-- custom accessibility end -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" media="all" type="text/css" href="../bangladesh.gov.bd/nav/css/obd.main.css">


    <link rel="stylesheet" href="{{asset('login_modal_assets/modal.css')}}" />
    @include('frontent.theme1.layouts.dynamiccss')
    <style>
        /* .modal-dialog {
          width: 500px;
        } */

    </style>
    @yield('style')

</head>

<body class="shed-portal-gov-bd">

    <div class="container">

        @include('frontent.theme4.layouts.header')


    <!-- Preloader -->


    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Banner PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
    @yield('content')

    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
</div>
@include('frontent.theme4.layouts.footer')
    

    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->


    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- JS Link -->
    {{-- <script src="{{asset('frontend_assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset('frontend_assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/all.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/venobox.min.js')}}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend_assets/js/custom.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('frontend_assets/plugins/fancybox/fancybox.js')}}"></script> --}}
    <!--Notification-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function () {
            $.get("{{route('expired-check')}}", function (data) {

                if (data.expired) {
                    $('#msg_head').html(data.msgHead);
                    $('#msg_body').html(data.msgBody);
                    $('#expiredModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).modal('show');
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
        $(".studentLoginBtn").click(function () {
            $(".studentLoginModal").modal('show');
        });

        $(".close").click(function () {
            $(".studentLoginModal").modal('hide');
        });

        $(".teacherLoginBtn").click(function () {
            $(".teacherLoginModal").modal('show');
        });

        $(".close").click(function () {
            $(".teacherLoginModal").modal('hide');
        });


        $("#logoutbtn").click(function () {
            $("#logout-form").submit();
        });

    </script>
    @yield('script')
    @stack('js')
</body>

</html>
