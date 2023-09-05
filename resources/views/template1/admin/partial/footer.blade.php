<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>

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

