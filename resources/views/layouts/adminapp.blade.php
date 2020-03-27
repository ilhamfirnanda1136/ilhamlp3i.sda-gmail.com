
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Siap Bersama</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
      <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/datatables.net-fixedcolumns-bs4/fixedColumns.bootstrap4.min.css">
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('asset')}}/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('asset')}}/assets/css/demo_11/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/preloader.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('asset')}}/assets/images/favicon.png" />
    @yield('header')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_horizontal-navbar.html -->
      <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
        @include('layouts.include.navbar')
        @include('layouts.include.sidebar')
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel container">
          @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © {{date('Y')}} <a href="http://www.bootstrapdash.com/" target="_blank"></a>. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
     <!--Loading Bar-->
   <div class="div-loading">
    <div id="loader" style="display: none;"></div>
  </div>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('asset')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('asset')}}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{asset('asset')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{asset('asset')}}/assets/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
      <!-- Plugin js for this page -->
    <script src="{{asset('asset')}}/assets/vendors/sweetalert/sweetalert.min.js"></script>
    <script src="{{asset('asset')}}/assets/js/shared/off-canvas.js"></script>
    <script src="{{asset('asset')}}/assets/js/shared/hoverable-collapse.js"></script>
    <script src="{{asset('asset')}}/assets/js/shared/misc.js"></script>
    <script src="{{asset('asset')}}/assets/js/shared/settings.js"></script>
    <script src="{{asset('asset')}}/assets/js/shared/todolist.js"></script>
    <script src="{{asset('js/input.js')}}"></script>
    <!-- endinject -->
    @yield('footer')
    <!-- End custom js for this page -->
  </body>
</html>