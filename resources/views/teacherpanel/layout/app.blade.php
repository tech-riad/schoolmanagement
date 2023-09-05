<!DOCTYPE html>
<html lang="en">

@include('teacherpanel.partial.head')

<body>

  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
   @include('teacherpanel.partial.sideber')
    <!-- partial: sideber end -->


    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_navbar.html -->
     @include('teacherpanel.partial.header_menu')
      <!-- partial _navber end -->


  <!-- main-panel start -->
     @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>



  <!-- plugins:js start-->
 @include('teacherpanel.partial.footer')
  <!-- End custom js for this page -->
  @stack('javascript');
</body>

</html>
