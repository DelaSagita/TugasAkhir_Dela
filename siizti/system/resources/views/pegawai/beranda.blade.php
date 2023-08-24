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
                        <h5 class="card-title text-primary">
                          <h3>Pengadilan Negeri Ketapang</h3>
                          Selamat datang {{ucwords(Auth::user()->pegawai_nama)}} 🎉</h5>
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


              <!-- SISA CUTI LOGIN -->

              <div class="col-lg-12 col-md-12 order-1">
                <div class="row">
                  <div class="col-lg-4 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img
                            src="{{url('public')}}/admin/assets/img/icons/unicons/chart-success.png"
                            alt="chart success"
                            class="rounded"
                            />
                          </div>
                          <div class="dropdown">
                            <button
                            class="btn p-0"
                            type="button"
                            id="cardOpt3"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                          </div>
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">SISA CUTI TAHUNAN</span>
                      <h4 class="card-title mb-2">{{$hasil_sisa_cuti_tahunan}} Hari</h4>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img
                          src="{{url('public')}}/admin/assets/img/icons/unicons/wallet-info.png"
                          alt="Credit Card"
                          class="rounded"
                          />
                        </div>
                        <div class="dropdown">
                          <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </div>
                    <span>JUMLAH CUTI ALASAN PENTING</span>
                    <h4 class="card-title text-nowrap mb-1">{{$alasan_penting}} Hari</h4>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Tahun Ini</small>
                  </div>
                </div>
              </div>
              

              <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img
                          src="{{url('public')}}/admin/assets/img/icons/unicons/wallet-info.png"
                          alt="Credit Card"
                          class="rounded"
                          />
                        </div>
                        <div class="dropdown">
                          <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </div>
                    <span>JUMLAH CUTI BESAR</span>
                    <h4 class="card-title text-nowrap mb-1">{{$cuti_besar}} Hari</h4>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Tahun Ini</small>
                  </div>
                </div>
              </div>

               <div class="col-lg-6 col-md-12 col-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img
                          src="{{url('public')}}/admin/assets/img/icons/unicons/wallet-info.png"
                          alt="Credit Card"
                          class="rounded"
                          />
                        </div>
                        <div class="dropdown">
                          <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </div>
                    <span>JUMLAH CUTI SAKIT</span>
                    <h4 class="card-title text-nowrap mb-1">{{$cuti_sakit}} Hari</h4>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Tahun Ini</small>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-12 col-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img
                          src="{{url('public')}}/admin/assets/img/icons/unicons/wallet-info.png"
                          alt="Credit Card"
                          class="rounded"
                          />
                        </div>
                        <div class="dropdown">
                          <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </div>
                    <span>LUAR TANGGUNGAN</span>
                    <h4 class="card-title text-nowrap mb-1">{{$cuti_negara}} Hari</h4>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Tahun Ini</small>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
<!-- END SISA CUTI LOGIN -->

              

              @if(Auth::user()->pegawai_pimpinan == 2)
              <!-- CUTI -->
              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0" style="float:right !important;">
                      <h5 class="m-0 me-2">Permintaan Cuti Tahunan</h5>
                      <small class="text-muted">{{$totalcutibulan}} Total Bulan Ini</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="float-right gap-1">
                        <h2 class="mb-2">{{$total_cuti_baru}}</h2>
                        <span>Permintaan Izin Cuti</span>
                      </div>
                      
                    </div>
                    <ul class="p-0 m-0" id="cuti">

                      @foreach($list_cuti as $c)
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
                            <small class="text-muted">Cuti Tahunan</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold">1 Jam yang lalu</small>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      <!-- end foreachpermintaan -->

                    </ul>
                  </div>
                </div>
              </div>

              <!-- IZIN TIDAK KELUAR KANTOR -->

              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0" style="float:right !important;">
                      <h5 class="m-0 me-2">Permintaan Keluar Kantor</h5>
                      <small class="text-muted">{{$count_keluar_kantor}} Total Bulan Ini</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="float-right gap-1">
                        <h2 class="mb-2">{{$count_keluar_kantor_baru}}</h2>
                        <span>Permintaan Masuk</span>
                      </div>
                      
                    </div>
                    <ul class="p-0 m-0">

                      @foreach($list_keluar_kantor as $s)
                      <!-- foreach permintaan -->
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary"
                          ><i class="bx bx-mobile-alt"></i
                          ></span>
                        </div>
                        <a href="{{url('p/permohonan-masuk/keluar-kantor',$s->keluar_kantor_id)}}/detail">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{$s->pegawai->pegawai_nama}}</h6>
                            <small class="text-muted">Izin Keluar Kantor</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold">{{$s->created_at}}</small>
                          </div>
                        </div>
                        </a>
                      </li>
                      <!-- end foreachpermintaan -->
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
                      <small class="text-muted">100 Total Bulan Ini</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="float-right gap-1">
                        <h2 class="mb-2">2</h2>
                        <span>Permintaan Izin Tidak Masuk Terbaru</span>
                      </div>
                      
                    </div>
                    <ul class="p-0 m-0" id="tidakmasuk">

                      <!-- foreach permintaan -->
                      @foreach($list_tidakmasuk as $t)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary"
                          ><i class="bx bx-mobile-alt"></i
                          ></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{ucwords($t->pegawai->pegawai_nama)}}</h6>
                            <small class="text-muted">{{$t->tgl_mulai_izin}} </small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold">{{$t->created_at->diffForHumans()}}</small>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      <!-- end foreachpermintaan -->

                    </ul>
                  </div>
                </div>
              </div>
              @endif

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


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

    // HOME 1

    function cuti(){
      $('#cuti').load("{{url('p/beranda')}}" + ' #cuti');
    }

    function izin(){
      $('#izin').load("{{url('p/beranda')}}" + ' #izin');
    }

    function tidakmasuk(){
      $('#tidakmasuk').load("{{url('p/beranda')}}" + ' #tidakmasuk');
    }

    setInterval(()=>{
      cuti();
      izin();
      tidakmasuk();
    }, 2000);

  </script>
  @include('template.section.js')
</body>
</html>
