<!DOCTYPE html>
<html lang="en">
  @include('Admin.layouts.head')

  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('Admin.partials._sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('Admin.partials._navbar')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('Admin.partials._footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('Admin.layouts.scripts')

  </body>
</html>