<script src="{{ asset('template2_asset/js/jquery-3.5.1.min.js') }}" ></script>
<!-- feather icon js-->
<script src="{{ asset('template2_asset/js/icons/feather-icon/feather.min.js') }}" ></script>
<script src="{{ asset('template2_asset/js/sidebar-menu.js') }}" ></script>
<!-- Sidebar jquery-->
<script src="{{ asset('template2_asset/js/config.js') }}" ></script>
<!-- Bootstrap js-->
{{-- <script src="{{ asset('template2_asset/js/bootstrap/popper.min.js') }}" ></script> --}}
{{-- <script src="{{ asset('template2_asset/js/bootstrap/bootstrap.min.js') }}" ></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Plugins JS start-->
<script src="https://laravel.pixelstrap.com/viho/assets/js/chart/chartist/chartist.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/chart/knob/knob.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/chart/knob/knob-chart.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/prism/prism.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/clipboard/clipboard.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/counter/jquery.waypoints.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/counter/jquery.counterup.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/counter/counter-custom.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/custom-card/custom-card.js"></script>
{{-- <script src="https://laravel.pixelstrap.com/viho/assets/js/notify/bootstrap-notify.min.js"></script> --}}
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js">
</script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js">
</script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/dashboard/default.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/notify/index.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->

<script src="{{ asset('template2_asset/js/script.js') }}" ></script>
<script src="{{ asset('template2_asset/js/theme-customizer/customizer.js') }}" ></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!--Notification-->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

$(document).ready(function(){
    $("#mid-menu").click(function(){
        $("nav#sidebar").toggleClass("navs");
        $(".container-fluid").toggleClass("navs2");
        
        
    })
})


</script>
<script>
$(document).ready(function(){
    $("#mid-menu2").click(function(){
        $("nav#sidebar").toggleClass("navs-mobile");
    })
})
</script>
<!-- End custom js for this page -->


