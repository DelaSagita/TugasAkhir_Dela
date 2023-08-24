<!DOCTYPE html>

<html
lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="{{url('public')}}/admin/assets/"
data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8" />
  <meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
  />

  <title>SIIZTI - @yield('title')</title>

  <meta name="description" content="" />
  @include('template.section.assets')
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      @include('template.section.sidebar')
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        @include('template.section.header')
        @include('template.utils.notif')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          @yield('content')
          <!-- / Content -->
        </div>

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            @include('template.section.footer')
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

<!--   <div class="buy-now">
    <a
    href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
    target="_blank"
    class="btn btn-danger btn-buy-now"
    >Upgrade to Pro</a
    >
  </div> -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>

    let table = new DataTable('.table');

</script>

  @include('template.section.js')
</body>
</html>
