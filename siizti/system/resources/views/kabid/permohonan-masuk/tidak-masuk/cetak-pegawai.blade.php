<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


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

    <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="{{url('public')}}/admin/assets/vendor/js/helpers.js"></script>

    <link rel="stylesheet" href="{{url('public')}}/font-awesome/css/font-awesome.min.css">

    <script src="{{url('public')}}/admin/assets/js/config.js"></script>
</head>
<body>
    <style>
        td{
            vertical-align: top !important;
        }
    </style>
    <div class="container">

        <!-- kop surat -->
        <div class="col-md-12">
            <table>
                <tr>
                    <td width="15%">
                        <center>
                            <img src="{{url('public/logo/pn-logo.png')}}" width="100%" class="float-right" alt="">
                        </center>
                    </td>
                    <td>
                        <center>
                            <b style="font-size:14pt">PENGADILAN NEGERI KETAPANG KELAS II</b><br>
                            JL. JENDRAL SUDIRMAN NO.19  TELP : (0534) 32805 FAX : (0534) 32805 <br>
                            website : www.pn-ketapang.go.id email : info@pn-ketapang.go.id <br>
                            KETAPANG - KALIMANTAN BARAT
                        </center>
                    </td>
                </tr>
            </table>
            <hr style="border: 1px solid black;">
        </div>
        <!-- end kop surat -->

        <div class="col-md-12">
                <table>
                    <tr>
                        <td style="width: 60%;"></td>
                        <td style="width: 40%;">
                             &nbsp;&nbsp;&nbsp;&nbsp; Ketapang, {{Carbon\Carbon::parse($detail->created_at)->isoFormat('D MMMM Y')}} <br> <br>
                            <p style="align: justify-all;">
                            KEPADA YTH: <br>
                            Ketua Pengadilan Negeri Ketapang <br>
                            di- <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; <u>KETAPANG</u>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>


        <table class="mt-2">
            <tr>
                <td colspan="2">Yang bertanda tangan dibawah ini : </td>
            </tr>
            <tr>
                <td>Nama </td>
                <td>: {{strtoupper($detail->pegawai->pegawai_nama)}}</td>
            </tr>

            <tr>
                <td>Selaku </td>
                <td>: {{strtoupper($detail->pegawai->pegawai_jabatan)}}</td>
            </tr>

             <tr>
                <td>Unit Organisasi </td>
                <td>: Pengadilan Negeri Ketapang</td>
            </tr>


            <tr>
                <td colspan="2">
                    <p class="mt-3"> Dengan ini mengajukan ijin tidak masuk kerja selama 2 hari, pada 
                     {{Carbon\Carbon::parse($detail->tgl_mulai_izin)->isoFormat('dddd, D MMMM Y')}} - {{Carbon\Carbon::parse($detail->tgl_selesai_izin)->isoFormat('dddd, D MMMM Y')}} karena {{$detail->alasan_izin}}. <br>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  Mohon kiranya permohonan izin saya ini untuk dapat dipertimbangkan. Atas perhatian Bapak/Ibu saya hanturkan Terima Kasih.
                    </p>
                </td>
            </tr>
        </table>

        <div class="row">
            <div class="col-md-6 col-6"></div>
            <div class="col-md-6 col-6 mt-5">
             <center>
                <b>Hormat Saya </b> <br>
                {!! QrCode::size(100)->generate(url('orisinalitas/tidak-masuk',$detail->td_masuk_id)); !!} <br>
                <b><u>{{ucwords($detail->pegawai->pegawai_nama)}}</u></b> <br>
                NIP. {{$detail->pegawai->pegawai_nip}}
            </center>
        </div>
    </div>
</div>



<script>
    window.print()
</script>

<script src="{{url('public')}}/admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{url('public')}}/admin/assets/vendor/libs/popper/popper.js"></script>
<script src="{{url('public')}}/admin/assets/vendor/js/bootstrap.js"></script>
<script src="{{url('public')}}/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{url('public')}}/admin/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{url('public')}}/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{url('public')}}/admin/assets/js/main.js"></script>

<!-- Page JS -->
<script src="{{url('public')}}/admin/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>