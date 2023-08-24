<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\OperatorPegawaiController;
use App\Http\Controllers\OperatorBidangController;
use App\Http\Controllers\OperatorKalenderliburController;
use App\Http\Controllers\OperatorPimpinanController;
use App\Http\Controllers\OperatorProfilController;
use App\Http\Controllers\OperatorPengaturancutiController;
use App\Http\Controllers\OrisinalitasController;


// PEGAWAI CONTROLLER
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PegawaiPermohonanController;
use App\Http\Controllers\PegawaiKalenderliburController;
use App\Http\Controllers\PegawaiProfilController;
use App\Http\Controllers\PegawaiPermohonanmasukController;

// KASUBAG CONTROLLER
use App\Http\Controllers\KasubagController;
use App\Http\Controllers\KasubagPermohonanController;
use App\Http\Controllers\KasubagPermohonanmasukController;
use App\Http\Controllers\KasubagRekapTahunanController;
use App\Http\Controllers\KasubagRekapBulananController;

// KABID CONTROLLER
use App\Http\Controllers\KabidController;
use App\Http\Controllers\KabidPermohonanmasukController;

// ADMIN
use App\Http\Controllers\AdminPegawaiController;
use App\Http\Controllers\AdminBidangController;
use App\Http\Controllers\AdminPimpinanController;
use App\Http\Controllers\AdminKasubagController;
use App\Http\Controllers\PlController;
use App\Http\Controllers\AdminKalenderliburController;
use App\Http\Controllers\AdminPtController;


// PIMPINAN
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\PimpinanPermohonanmasukController;
use App\Http\Controllers\PimpinanPermohonanController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('template.base');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login');
    Route::get('surat', 'surat');
    Route::get('login', 'login')->name('login');
    Route::get('logout', 'logout');
    Route::post('login', 'loginProcess');
});

Route::controller(OrisinalitasController::class)->group(function () {
    Route::get('orisinalitas/keluar-kantor/{keluarkantor:kode_token}', 'keluarKantor');
    Route::get('orisinalitas/tidak-masuk/{tidakmasuk:kode_token}', 'tidakMasuk');
    Route::get('orisinalitas/cuti/{cuti:kode_token}', 'cuti');
});

Route::middleware('auth')->group(function(){


    // KABID CONTROLLER
    Route::prefix('kb')->group(function () {
        Route::controller(KabidController::class)->group(function () {
           Route::get('beranda', 'beranda');
       });
        Route::prefix('permohonan')->group(function () {

            Route::controller(PegawaiPermohonanController::class)->group(function () {
                // IZIN CUTI
               Route::get('cuti', 'indexCuti');
               Route::get('cuti/create', 'createCuti');
               Route::get('cuti/{cuti}/cetak', 'cetakCuti');
               Route::get('cuti/{cuti}/show', 'showCuti');

               Route::get('cuti/{cuti}/hapus', 'destroyCuti');
               Route::post('cuti/create', 'storeCuti');

               // TIDAK MASUK KERJA
               Route::get('tidak-masuk', 'indexTidakmasuk');
               Route::get('tidak-masuk/create', 'createTidakmasuk');
               Route::post('tidak-masuk/create', 'storeTidakmasuk');
               Route::get('tidak-masuk/{tidakmasuk}/cetak', 'cetakTidakmasuk');
               Route::get('tidak-masuk-pegawai/{tidakmasuk}/cetak', 'cetakTidakmasukPegawai');
               Route::get('tidak-masuk/{tidakmasuk}/delete', 'destroyTidakMasuk');

               // KELUAR KANTOR
               Route::get('keluar-kantor', 'indexKeluarkantor');
               Route::get('keluar-kantor/create', 'createKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/delete', 'destroyKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/cetak', 'cetakKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/detail', 'showKeluarkantor');
               Route::post('keluar-kantor/create','storeKeluarkantor');
           });

        });

        Route::prefix('permohonan-masuk')->group(function () {
           Route::controller(KabidPermohonanmasukController::class)->group(function () {
                // IZIN CUTI
               Route::get('cuti', 'indexCuti');
               Route::get('cuti/validasi', 'validasi');
               Route::get('cuti/tolak', 'tolak');
               Route::get('cuti/create', 'createCuti');
               Route::get('cuti/{cuti}/detail', 'showCuti');
               Route::get('cuti/{cuti}/cetak', 'cetakCuti');
               Route::get('cuti/{cuti}/terima-kabid', 'terimaKabid');
               Route::put('cuti/{cuti}/tangguhkan', 'tangguhkanKabid');
               Route::put('cuti/{cuti}/perubahan', 'perubahanKabid');
               Route::post('cuti/create', 'storeCuti');

               // TIDAK MASUK KERJA
               Route::get('tidak-masuk', 'indexTidakmasuk');
               Route::get('tidak-masuk/create', 'createTidakmasuk');
               Route::post('tidak-masuk/create', 'storeTidakmasuk');
               Route::get('tidak-masuk/{tidakmasuk}/cetak', 'cetakTidakmasuk');
               Route::get('tidak-masuk/{tidakmasuk}/delete', 'destroyTidakMasuk');

               // KELUAR KANTOR
               Route::get('keluar-kantor', 'indexKeluarkantor');
               Route::get('keluar-kantor/create', 'createKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/delete', 'destroyKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/cetak', 'cetakKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/detail', 'showKeluarkantor');
               Route::post('keluar-kantor/create','storeKeluarkantor');
           });
       });
    });


    // PEGAWAI CONTROLLER
    Route::prefix('p')->group(function () {

        Route::controller(PegawaiController::class)->group(function () {
           Route::get('beranda', 'beranda');
       });

        Route::controller(PegawaiKalenderliburController::class)->group(function () {
           Route::get('kalender-libur', 'index');
       });

        Route::controller(PegawaiProfilController::class)->group(function () {
           Route::get('profil-akun', 'index');
           Route::put('profil-akun/{user}/update', 'update');
           Route::put('profil-akun/ganti-password/{user}', 'gantiPasword');

       });


        Route::prefix('permohonan')->group(function () {

            Route::controller(PegawaiPermohonanController::class)->group(function () {
                // IZIN CUTI
               Route::get('cuti', 'indexCuti');
               Route::get('cuti/create', 'createCuti');
               Route::get('cuti/{cuti}/cetak', 'cetakCuti');
               Route::get('cuti/{cuti}/show', 'showCuti');
               Route::get('cuti/{cuti}/hapus', 'destroyCuti');
               Route::post('cuti/create', 'storeCuti');

               // TIDAK MASUK KERJA
               Route::get('tidak-masuk', 'indexTidakmasuk');
               Route::get('tidak-masuk/create', 'createTidakmasuk');
               Route::post('tidak-masuk/create', 'storeTidakmasuk');
               Route::get('tidak-masuk/{tidakmasuk}/cetak', 'cetakTidakmasuk');
               Route::get('tidak-masuk-pegawai/{tidakmasuk}/cetak', 'cetakTidakmasukPegawai');
               Route::get('tidak-masuk/{tidakmasuk}/delete', 'destroyTidakMasuk');

               // KELUAR KANTOR
               Route::get('keluar-kantor', 'indexKeluarkantor');
               Route::get('keluar-kantor/create', 'createKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/delete', 'destroyKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/cetak', 'cetakKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/detail', 'showKeluarkantor');
               Route::post('keluar-kantor/create','storeKeluarkantor');
           });

        });

        Route::prefix('permohonan-masuk')->group(function () {

            Route::controller(PegawaiPermohonanmasukController::class)->group(function () {
                // IZIN CUTI
               Route::get('cuti', 'indexCuti');
               Route::get('cuti/{cuti}/cetak', 'cetakCuti');
               Route::get('cuti/{cuti}/detail', 'showCuti');
               Route::put('cuti/{cuti}/terima-kasubag', 'terimaKasubag');
               Route::get('cuti/{cuti}/terima-kabid', 'terimaKabid');
               Route::get('cuti/{cuti}/terima-pimpinan', 'terimaPimpinan');

               // TIDAK MASUK KERJA
               Route::get('tidak-masuk', 'indexTidakmasuk');
               Route::get('tidak-masuk/create', 'createTidakmasuk');
               Route::post('tidak-masuk/create', 'storeTidakmasuk');
               Route::get('tidak-masuk/{tidakmasuk}/cetak-pegawai', 'cetakTidakmasukPegawai');
               Route::get('tidak-masuk/{tidakmasuk}/cetak', 'cetakTidakmasuk');
               Route::put('tidak-masuk/{tidakmasuk}/tolak', 'tolakTidakMasuk');
               Route::get('tidak-masuk/{tidakmasuk}/terima', 'terimaTidakMasuk');
               Route::get('tidak-masuk/{tidakmasuk}/detail', 'showTidakMasuk');
               Route::get('tidak-masuk/{tidakmasuk}/terima-pimpinan', 'terimaTidakMasukPimpinan');
               Route::put('tidak-masuk/{tidakmasuk}/tolak-pimpinan', 'tolakTidakMasukPimpinan');

               // KELUAR KANTOR
               Route::get('keluar-kantor', 'indexKeluarkantor');
               Route::get('keluar-kantor/create', 'createKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/delete', 'destroyKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/cetak', 'cetakKeluarkantor');
               Route::put('keluar-kantor/{keluarkantor}/tolak', 'tolakKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/terima', 'terimaKeluarkantor');
               Route::get('keluar-kantor/{keluarkantor}/detail', 'showKeluarkantor');
               Route::post('keluar-kantor/create','storeKeluarkantor');
           });

        });

    });


     // KASUBAG CONTROLLER
Route::prefix('k')->group(function () {

    Route::controller(KasubagController::class)->group(function () {
       Route::get('beranda', 'beranda');
   });

    Route::controller(KasubagRekapTahunanController::class)->group(function () {
       Route::get('rekap-tahunan', 'index');
       Route::get('rekap-tahunan/cetak', 'cetak');
   });

    Route::controller(KasubagRekapBulananController::class)->group(function () {
       Route::get('rekap-bulanan/{bulan}/{tahun}', 'index');
       Route::get('rekap-bulanan/cetak/{bulan}/{tahun}', 'cetak');
   });

    Route::controller(KasubagPermohonanController::class)->group(function () {
     Route::prefix('permohonan')->group(function () {
         Route::get('cuti', 'indexCuti');

           // TIDAK MASUK KERJA
         Route::get('tidak-masuk', 'indexTidakmasuk');
         Route::get('tidak-masuk/create', 'createTidakmasuk');
         Route::post('tidak-masuk/create', 'storeTidakmasuk');
         Route::get('tidak-masuk/{tidakmasuk}/cetak', 'cetakTidakmasuk');
         Route::get('tidak-masuk-pegawai/{tidakmasuk}/cetak', 'cetakTidakmasukPegawai');
         Route::get('tidak-masuk/{tidakmasuk}/delete', 'destroyTidakMasuk');

               // KELUAR KANTOR
         Route::get('keluar-kantor', 'indexKeluarkantor');
         Route::get('keluar-kantor/create', 'createKeluarkantor');
         Route::get('keluar-kantor/{keluarkantor}/delete', 'destroyKeluarkantor');
         Route::get('keluar-kantor/{keluarkantor}/cetak', 'cetakKeluarkantor');
         Route::get('keluar-kantor/{keluarkantor}/detail', 'showKeluarkantor');
         Route::post('keluar-kantor/create','storeKeluarkantor');
     });
 });

    Route::controller(KasubagPermohonanmasukController::class)->group(function () {
     Route::prefix('permohonan-masuk')->group(function () {
         Route::get('cuti', 'indexCuti');
         Route::get('cuti/validasi', 'validasi');
         Route::get('cuti/tolak', 'tolak');
         Route::get('cuti', 'indexCuti');
         Route::get('cuti/{cuti}/detail', 'showCuti');
         Route::put('cuti/{cuti}/terima-kasubag', 'terimaKasubag');
         Route::put('cuti/{cuti}/tolak-kasubag', 'tolakKasubag');


           // TIDAK MASUK KERJA
         Route::get('tidak-masuk', 'indexTidakmasuk');
         Route::get('tidak-masuk/create', 'createTidakmasuk');
         Route::post('tidak-masuk/create', 'storeTidakmasuk');
         Route::get('tidak-masuk/{tidakmasuk}/cetak-pegawai', 'cetakTidakmasukPegawai');
         Route::get('tidak-masuk/{tidakmasuk}/cetak', 'cetakTidakmasuk');
         Route::put('tidak-masuk/{tidakmasuk}/tolak', 'tolakTidakMasuk');
         Route::get('tidak-masuk/{tidakmasuk}/terima', 'terimaTidakMasuk');
         Route::get('tidak-masuk/{tidakmasuk}/detail', 'showTidakMasuk');
         Route::get('tidak-masuk/{tidakmasuk}/terima-pimpinan', 'terimaTidakMasukPimpinan');
         Route::put('tidak-masuk/{tidakmasuk}/tolak-pimpinan', 'tolakTidakMasukPimpinan');

               // KELUAR KANTOR
         Route::get('keluar-kantor', 'indexKeluarkantor');
         Route::get('keluar-kantor/create', 'createKeluarkantor');
         Route::get('keluar-kantor/{keluarkantor}/delete', 'destroyKeluarkantor');
         Route::get('keluar-kantor/{keluarkantor}/cetak', 'cetakKeluarkantor');
         Route::put('keluar-kantor/{keluarkantor}/tolak', 'tolakKeluarkantor');
         Route::get('keluar-kantor/{keluarkantor}/terima', 'terimaKeluarkantor');
         Route::get('keluar-kantor/{keluarkantor}/detail', 'showKeluarkantor');
         Route::post('keluar-kantor/create','storeKeluarkantor');



     });
 });

});



Route::prefix('admin')->group(function () {

    Route::controller(AdminController::class)->group(function () {
       Route::get('beranda', 'beranda');
   });

    Route::controller(AdminPegawaiController::class)->group(function () {
      Route::get('pegawai', 'index');
      Route::get('pegawai/{pegawai}/detail', 'show');
      Route::get('pegawai/create', 'create');
      Route::post('pegawai/create', 'store');
      Route::get('pegawai/{pegawai}/edit', 'edit');
      Route::put('pegawai/{pegawai}/update', 'update');
      Route::get('pegawai/{pegawai}/hapus', 'destroy');

      Route::get('pensiun', 'indexPensiun');
      Route::put('pegawai/{pegawai}/pensiunkan', 'pensiunkan');
      Route::put('pegawai/{pegawai}/aktifkan', 'aktifkan');

      Route::get('honorer', 'indexHonorer');
      Route::get('honorer/create', 'createHonorer');
      Route::post('honorer/create', 'storeHonorer');
  });

    Route::controller(AdminBidangController::class)->group(function () {
      Route::get('bidang', 'index');
      Route::get('bidang/create', 'create');
      Route::post('bidang/create', 'store');
      Route::put('bidang/{bidang}/edit', 'update');
      Route::get('bidang/{bidang}/hapus', 'destroy');
  });

    Route::controller(AdminKalenderliburController::class)->group(function () {
      Route::get('kalender-libur', 'index');
      Route::post('kalender-libur/create', 'store');
      Route::get('kalender-libur/{kalender}/hapus', 'destroy');
  });

    Route::controller(PlController::class)->group(function () {
       Route::get('plt', 'indexPlt');
       Route::get('plt/create', 'createPlt');
       Route::get('plt/selesai/{plt}', 'selesaiPlt');
       Route::get('plt/hapus/{plt}', 'destroyPlt');
       Route::post('plt/create', 'storePlt');

       Route::get('plh', 'indexPlh');
       Route::get('plh/create', 'createPlh');
       Route::get('plh/selesai/{plh}', 'selesaiPlh');
       Route::get('plh/hapus/{plh}', 'destroyPlh');
       Route::post('plh/create', 'storePlh');
   });

    Route::prefix('pengaturan')->group(function () {
        Route::controller(AdminPimpinanController::class)->group(function () {
             // PIMPINAN
         Route::get('pimpinan', 'index');
         Route::post('pimpinan/update', 'update');

     });

        Route::controller(AdminKasubagController::class)->group(function () {
             // PIMPINAN
         Route::get('kasubag', 'index');
         Route::post('kasubag/update', 'update');

     });
    });




    Route::controller(AdminPtController::class)->group(function () {
             // PIMPINAN
     Route::get('pengaturan-pt', 'index');
     Route::post('pengaturan-pt/{pt}/update', 'update');

 });

});



    // PIMPINAN PENGADILAN
Route::prefix('pimpinan')->group(function () {
    Route::controller(PimpinanController::class)->group(function () {
       Route::get('beranda', 'beranda');
   });

    Route::prefix('permohonan-masuk')->group(function () {
        Route::controller(PimpinanPermohonanmasukController::class)->group(function () {
                // KELUARKANTOR
           Route::get('keluar-kantor', 'indexKeluarkantor');
           Route::get('keluar-kantor/{id}/detail', 'showKeluarkantor');
           Route::get('keluar-kantor/{id}/cetak', 'cetakKeluarkantor');
           Route::put('keluar-kantor/{id}/tolak', 'tolakKeluarkantor');
           Route::get('keluar-kantor/{id}/terima', 'terimaKeluarkantor');

             // TIDAKMASUK
           Route::get('tidak-masuk', 'indexTidakmasuk');
           Route::get('tidak-masuk/{tidakmasuk}/detail', 'showTidakMasuk');

           // CUTI
           Route::get('cuti', 'indexCuti');
           Route::get('cuti/validasi', 'validasi');
           Route::get('cuti/tolak', 'tolak');
           Route::get('cuti/{cuti}/detail', 'showCuti');
           Route::get('cuti/{cuti}/terima-pimpinan', 'terimaPimpinan');
           Route::put('cuti/{cuti}/tolak-pimpinan', 'tolakPimpinan');
           Route::put('cuti/{cuti}/tangguhkan', 'tangguhkanPimpinan');
           Route::put('cuti/{cuti}/perubahan', 'perubahanPimpinan');
       });
    });



    Route::prefix('permohonan')->group(function () {
        Route::controller(PimpinanPermohonanController::class)->group(function () {
                // IZIN CUTI
           Route::get('cuti', 'indexCuti');
           Route::get('cuti/create', 'createCuti');
           Route::get('cuti/{cuti}/cetak', 'cetakCuti');
           Route::get('cuti/{cuti}/show', 'showCuti');
           Route::post('cuti/create', 'storeCuti');

               // TIDAK MASUK KERJA
           Route::get('tidak-masuk', 'indexTidakmasuk');
           Route::get('tidak-masuk/create', 'createTidakmasuk');
           Route::post('tidak-masuk/create', 'storeTidakmasuk');
           Route::get('tidak-masuk/{tidakmasuk}/cetak', 'cetakTidakmasuk');
           Route::get('tidak-masuk-pegawai/{tidakmasuk}/cetak', 'cetakTidakmasukPegawai');
           Route::get('tidak-masuk/{tidakmasuk}/delete', 'destroyTidakMasuk');

               // KELUAR KANTOR
           Route::get('keluar-kantor', 'indexKeluarkantor');
           Route::get('keluar-kantor/create', 'createKeluarkantor');
           Route::get('keluar-kantor/{keluarkantor}/delete', 'destroyKeluarkantor');
           Route::get('keluar-kantor/{keluarkantor}/cetak', 'cetakKeluarkantor');
           Route::get('keluar-kantor/{keluarkantor}/detail', 'showKeluarkantor');
           Route::post('keluar-kantor/create','storeKeluarkantor');
       });

    });


});

});










