<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <link rel="stylesheet" href="{{url('/')}}/admin/fonts/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/fonts/iconfonts/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/fonts/iconfonts/typicons/src/font/typicons.css">
  <!-- <link rel="stylesheet" href="{{url('/')}}/admin/fonts/iconfonts/font-awesome/css/font-awesome.css"> -->
  <link rel="stylesheet" href="{{url('/')}}/admin/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/css/shared.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/css/style.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/css/bootstrap-select.css">
  <link rel="shortcut icon" href="{{url('/')}}/admin/images/favicon.png" />
  @yield('admin-css')
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('/')}}/dashboard">
          <img src="../../../admin/images/logo.svg" alt="logo" /> </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/')}}/dashboard">
          <img src="../../../admin/images/logo-mini.svg" alt="logo" /> </a>
      </div>
      @include('admin.components.nav')
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('admin.components.leftsidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @include('messages')
          @yield('content')
        </div>
        @include('admin.components.footer')
      </div>
    </div>
  </div>

  <script src="{{url('/')}}/admin/js/vendor.bundle.base.js"></script>
  <script src="{{url('/')}}/admin/js/vendor.bundle.addons.js"></script>
  <script src="{{url('/')}}/admin/js/off-canvas.js"></script>
  <script src="{{url('/')}}/admin/js/misc.js"></script>
  <script src="{{url('/')}}/admin/js/misc.js"></script>
  <script src="{{url('/')}}/admin/js/operational.js"></script>
  <script src="{{url('/')}}/admin/js/bootstrap-select.min.js"></script>


  @yield('admin-js')


</body>

</html>
