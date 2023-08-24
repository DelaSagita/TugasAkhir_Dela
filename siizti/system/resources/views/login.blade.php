<!DOCTYPE html>

<html
lang="en"
class="light-style customizer-hide"
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

  <title>Login </title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{url('public')}}/admin/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
  />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{url('public')}}/admin/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="{{url('public')}}/admin/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('public')}}/admin/assets/js/config.js"></script>
    <link rel="stylesheet" href="{{url('public')}}/font-awesome/css/font-awesome.min.css">
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                 <center>
                   
                  <img src="{{url('public/logo/pn-logo.png')}}" width="40%" alt="">
                </center>
              </a>
            </div>
            <h4 class="mb-2">Selamat Datang di SIIZTI! 👋</h4>
            <p class="mb-4">Sistem Informasi Izin dan Cuti Pengadilan Negeri Ketapang</p>
            @include('template.utils.notif')
            <form id="formAuthentication" class="mb-3" action="{{url('login')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label" >Email or Username</label>
                <input
                type="text"
                class="form-control" required 
                id="email"
                name="email"
                placeholder="Enter your email or username"
                autofocus
                />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password" >Password</label>
                  
                </div>
                <div class="input-group input-group-merge">
                  <input
                  type="password"
                  id="password"
                  class="form-control " required 
                  name="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>

          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{url('public')}}/admin/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="{{url('public')}}/admin/assets/vendor/libs/popper/popper.js"></script>
  <script src="{{url('public')}}/admin/assets/vendor/js/bootstrap.js"></script>
  <script src="{{url('public')}}/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="{{url('public')}}/admin/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="{{url('public')}}/admin/assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
