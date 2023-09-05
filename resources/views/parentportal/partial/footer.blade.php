<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- webcam snap take --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
<script>
    // CAMERA SETTINGS.
    // Webcam.set({
    //     width: 220,
    //     height: 190,
    //     image_format: 'jpeg',
    //     jpeg_quality: 100
    // });
    // Webcam.attach('#camera');

    // // SHOW THE SNAPSHOT.
    // takeSnapShot = function () {
    //     Webcam.snap(function (data_uri) {
    //         document.getElementById('snapShot').innerHTML =
    //             '<img src="' + data_uri + '" width="70px" height="50px" />';
    //     });
    // }
</script>
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
{{-- <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
{{-- <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script> --}}
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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
@section('javascript')

