<!DOCTYPE html>
<html lang="en">

@include($adminTemplate.'.admin.partial.head')
<link rel="stylesheet" href="{{asset('assets/vendors/chosen/chosen.css')}}">
<body>

  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
   @include($adminTemplate.'.admin.partial.sideber')
    <!-- partial: sideber end -->


    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_navbar.html -->
     @include($adminTemplate.'.admin.partial.header_menu')
      <!-- partial _navber end -->


  <!-- main-panel start -->
     @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>



  <!-- plugins:js start-->
 @include($adminTemplate.'.admin.partial.footer')
  <!-- End custom js for this page -->
<script src="{{asset('assets/vendors/chosen/chosen.jquery.js')}}"></script>
{{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> --}}
 @stack('js')
</body>

</html>
