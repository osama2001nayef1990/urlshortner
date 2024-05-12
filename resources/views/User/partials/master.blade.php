<!DOCTYPE html>
<html lang="en">
  @include('User.layouts.head')

  <body>
    <div class="container-scroller" >
      
      <!-- partial:partials/_sidebar.html -->
      @include('User.partials._sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('User.partials._navbar')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('User.partials._footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('User.layouts.scripts')

  </body>
</html>