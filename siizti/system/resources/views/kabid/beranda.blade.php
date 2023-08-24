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

  <title>SIIZTI</title>

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

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary">Selamat datang {{ucwords(Auth::user()->pegawai_nama)}} 🎉</h5>
                      
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-4">
                        <img
                        src="{{url('public')}}/admin/assets/img/illustrations/man-with-laptop-light.png"
                        height="140"
                        alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- CUTI -->
             
              <!-- CUTI -->
              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0" style="float:right !important;">
                      <h5 class="m-0 me-2">Permintaan Cuti</h5>
                      <small class="text-muted">{{$totalcutibulan}} Total Bulan Ini</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="float-right gap-1">
                        <h2 class="mb-2">{{$totalcuti}}</h2>
                        <span>Permintaan Cuti</span>
                      </div>
                      
                    </div>
                    <ul class="p-0 m-0" id="cuti">

                      @foreach($list_cuti->sortByDesc('created_at')->take(5) as $c)
                      <!-- foreach permintaan -->
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary"
                          ><i class="bx bx-mobile-alt"></i
                          ></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{ucwords($c->pegawai->pegawai_nama)}}</h6>
                            <small class="text-muted">{{$c->created_at->diffForHumans()}}</small>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      <!-- end foreachpermintaan -->

                    </ul>
                  </div>
                </div>
              </div>

              <!-- IZIN  KELUAR KANTOR -->

              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0" style="float:right !important;">
                      <h5 class="m-0 me-2">Izin Keluar Kantor</h5>
                      <small class="text-muted">{{$keluarkantor}} Total Bulan Ini</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="float-right gap-1">
                        <span>Permintaan Izin Keluar Kantor</span>
                      </div>
                      
                    </div>
                    <ul class="p-0 m-0">

                    @foreach($list_keluar->sortByDesc('created_at')->take(5) as $x)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary"
                          ><i class="bx bx-mobile-alt"></i
                          ></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{$x->pegawai->pegawai_nama}}</h6>
                            <small class="text-muted">{{$x->created_at->diffForHumans()}}</small>
                          </div>
                        </div>
                      </li>
                      @endforeach

                    </ul>
                  </div>
                </div>
              </div>


              <!-- IZIN TIDAK MASUK -->
              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0" style="float:right !important;">
                      <h5 class="m-0 me-2">Izin Tidak Masuk</h5>
                      <small class="text-muted">{{$tidakmasuk}} Total Bulan Ini</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="float-right gap-1">
                        <span>Permintaan Izin Tidak Masuk</span>
                      </div>
                      
                    </div>
                    <ul class="p-0 m-0">

                      @foreach($list_tidakmasuk->sortByDesc('created_at')->take(5) as $t)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary"
                          ><i class="bx bx-mobile-alt"></i
                          ></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{$t->pegawai->pegawai_nama}}</h6>
                            <small class="text-muted">{{$t->created_at->diffForHumans()}}</small>
                          </div>
                        </div>
                      </li>
                      @endforeach

                    </ul>
                  </div>
                </div>
              </div>


            </div>
          </div>
          <!-- / Content -->

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


  @include('template.section.js')
</body>
</html>
