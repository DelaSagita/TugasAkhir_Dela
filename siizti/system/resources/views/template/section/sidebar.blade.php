<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme  bg-primary">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <h3 class="fw-bolder ms-2 mt-3" style="color:#ffffff"><img src="{{url('public/logo/pn-logo.png')}}" width="30px" alt=""> SIIZTI <br>

        <p style="font-size: 8pt;">Sistem Informasi Izin dan Cuti</p>
      </h3>

    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-4 ">

    @if(Auth::user()->pegawai_level == 4)
      <!-- PEGAWAI -->
      @include('template.section.menu.pegawai')
      
      <!-- KASUBAG -->
      @elseif(Auth::user()->pegawai_level == 3)
      @include('template.section.menu.kasubag')

      <!-- KABID -->
      @elseif(Auth::user()->pegawai_level == 2)
      @include('template.section.menu.kabid')

      <!-- PIMPINAN PN -->
      @elseif(Auth::user()->pegawai_level == 1)
      @include('template.section.menu.pimpinan')

       <!-- Admin APlikasi -->
      @elseif(Auth::user()->pegawai_level == 0)
      @include('template.section.menu.admin')
    @endif
  </ul>
</aside>