<!DOCTYPE html>
<html lang="en">

@include($adminTemplate.'.admin.partial.head')
<link rel="stylesheet" href="{{asset('assets/vendors/chosen/chosen.css')}}">
<body>

  <div class="loader-wrapper">
    <div class="theme-loader"></div>
  </div>

  <div class="page-wrapper compact-sidebar" id="pageWrapper">
  
    @include($adminTemplate.'.admin.partial.header_menu')
    <!-- partial:partials/_sidebar.html -->
    <!-- partial: sideber end -->
    
    
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial:partials/_navbar.html -->
      <!-- partial _navber end -->
      
      @include($adminTemplate.'.admin.partial.sideber')

  <!-- page-body start -->
     @yield('content')
      <!-- page-body ends -->
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
