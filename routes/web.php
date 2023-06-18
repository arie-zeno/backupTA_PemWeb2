<?php

use App\Models\Biodata;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\AlumniPostController;
use App\Http\Controllers\AdminBiodataController;
use App\Http\Controllers\AlumniBiodataController;
use App\Http\Controllers\AdminPekerjaanController;

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

Route::get('/', function () {
    $biodatas = Biodata::all();
    $pekerjaans = Pekerjaan::all();
    if(count($biodatas) >= 1){

    $total = 0;
    $dataKuliah = [];
    $dataNama = [];
    $kelulusan_2020 = [];
    $kelulusan_2021 = [];
    $kelulusan_2022 = [];
    $kelulusan_2023 = [];
    $kelulusan_2024 = [];
    $kelulusan_2025 = [];
    $kelulusanLebih6Thn = [];
    $kelulusanLebih5Thn = [];
    $kelulusanKurang4Thn = [];

    foreach ($biodatas as $biodata) {
        $selisih = $biodata->thnLulus - $biodata->thnMasuk;
        $dataKuliah[] = $selisih;
        $dataNama[] = $biodata->name; 
        $total += $selisih;

        if($selisih > 6){
            $warnaBar[] = "#B70404";
            $kelulusanLebih6Thn[] = $selisih;
        }else if($selisih > 4 && $selisih <= 6 ){
            $warnaBar[] = "#36A2EB";
            $kelulusanLebih5Thn[] = $selisih;
        }else if($selisih < 5){
            $warnaBar[] = "#47A992";
            $kelulusanKurang4Thn[] = $selisih;
        }

        if($biodata->thnLulus == 2020){
            $kelulusan_2020[] = $biodata->nim;
        }else if($biodata->thnLulus == 2021){
            $kelulusan_2021[] = $biodata->nim;
        }else if($biodata->thnLulus == 2022){
            $kelulusan_2022[] = $biodata->nim;
        }else if($biodata->thnLulus == 2023){
            $kelulusan_2023[] = $biodata->nim;
        }else if($biodata->thnLulus == 2024){
            $kelulusan_2024[] = $biodata->nim;
        }else if($biodata->thnLulus == 2025){
            $kelulusan_2025[] = $biodata->nim;
        }
    }

    $pRelevan = 0;
    $pTRelevan = 0;
    $kategoriPekerjaan1 = 0;
    $kategoriPekerjaan2 = 0;
    $kategoriPekerjaan3 = 0;
    $kategoriPekerjaan4 = 0;
    $kategoriPekerjaan5 = 0;

    $gajiAlumni = [0,0,0,0,0];

    $totalGaji = 0;

    foreach($pekerjaans as $pekerjaan){
        if($pekerjaan->relevansi_pekerjaan == "relevan"){
            $pRelevan += 1;
        }else{
            $pTRelevan += 1;
        }

        if($pekerjaan->kategori_pekerjaan == "IT Non kependidikan"){
            $kategoriPekerjaan1 += 1;
        }else if($pekerjaan->kategori_pekerjaan == "IT kependidikan"){
            $kategoriPekerjaan2 += 1;            
        }else if($pekerjaan->kategori_pekerjaan == "Kependidikan IT"){
            $kategoriPekerjaan3 += 1;
        }else if($pekerjaan->kategori_pekerjaan == "Kependidikan Non IT"){
            $kategoriPekerjaan4 += 1;
        }else if($pekerjaan->kategori_pekerjaan == "Non IT Non Kependidikan"){
            $kategoriPekerjaan5 += 1;
        }

        if($pekerjaan->gaji > 1000000 && $pekerjaan->gaji < 3000000){
            $gajiAlumni[0] += 1;
            $totalGaji += $pekerjaan->gaji;
        }else if($pekerjaan->gaji >= 3000000 && $pekerjaan->gaji < 8000000){
            $gajiAlumni[1] += 1;
            $totalGaji += $pekerjaan->gaji;
        }else if($pekerjaan->gaji >= 8000000 && $pekerjaan->gaji < 13000000){
            $gajiAlumni[2] += 1;
            $totalGaji += $pekerjaan->gaji;
        }else if($pekerjaan->gaji >= 13000000 && $pekerjaan->gaji < 18000000){
            $gajiAlumni[3] += 1;
            $totalGaji += $pekerjaan->gaji;
        }else if($pekerjaan->gaji >= 18000000 && $pekerjaan->gaji < 25000000){
            $gajiAlumni[4] += 1;
            $totalGaji += $pekerjaan->gaji;
        }
    }
    $avg = $total / count($biodatas);


    $avgGaji = $totalGaji / count($pekerjaans);

    
    return view('home', [
        "title" => "home",
        "biodatas" => $biodatas,
        "dataLamaKuliah" => json_encode($dataKuliah),
        "rata2_kuliah" => $avg,
        "kelulusan_2020" => $kelulusan_2020,
        "kelulusan_2021" => $kelulusan_2021,
        "kelulusan_2022" => $kelulusan_2022,
        "kelulusan_2023" => $kelulusan_2023,
        "kelulusan_2024" => $kelulusan_2024,
        "kelulusan_2025" => $kelulusan_2025,
        "belumBekerja" => Biodata::where("pekerjaan", "belum")->get(),
        "sudahBekerja" => Biodata::where("pekerjaan", "sudah")->get(),
        "dataNama" => json_encode($dataNama),
        "K6tahun" => $kelulusanLebih6Thn,
        "K5tahun" => $kelulusanLebih5Thn,
        "K3tahun" => $kelulusanKurang4Thn,
        "pRelevan" => $pRelevan,
        "pTRelevan" => $pTRelevan,
        "kategoriPekerjaan1" => $kategoriPekerjaan1,
        "kategoriPekerjaan2" => $kategoriPekerjaan2,
        "kategoriPekerjaan3" => $kategoriPekerjaan3,
        "kategoriPekerjaan4" => $kategoriPekerjaan4,
        "kategoriPekerjaan5" => $kategoriPekerjaan5,
        "gajiAlumni" => $gajiAlumni,
        "avgGaji" => $avgGaji,
        
    ]);
}else{
    return view('home', [
        "title" => "home",
        "biodatas" => Biodata::all()
    
    ]);
}
});


Route::get('/login', [LoginController::class, "index"])->name('login')->middleware("guest");
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);


Route::get('/register', [RegisterController::class, "index"])->middleware("guest");
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/alumni', function () {
    return view('alumni.index');
});

Route::resource('/alumni/bios', AlumniController::class)->middleware("auth");
// Route::get('/alumni/works/{work:id}', [PekerjaanController::class, 'show']); 
// Route::resource('/alumni/works', PekerjaanController::class)->middleware("auth");
Route::resource('/alumni/works', PekerjaanController::class)->middleware("auth");
Route::resource('/admin/user', AdminController::class)->middleware("auth");
Route::resource('/admin/biodata', AdminBiodataController::class)->middleware("auth");
Route::resource('/admin/pekerjaan', AdminPekerjaanController::class)->middleware("auth");
// Route::get('/alumni/works}', [WorkController::class, 'index']);
// Route::get('/alumni/works/{work}', [WorkController::class, 'show']);

// Route::get('/admin/pdf', [AdminController::class, 'exportPDF'])->name('export.pdf');

// user
Route::get('file-import-export', [AdminController::class, 'fileImportExport']);
Route::post('file-import', [AdminController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [AdminController::class, 'fileExport'])->name('file-export');

// biodata
Route::get('biodata-import-export', [AdminBiodataController::class, 'fileImportExport']);
Route::post('biodata-import', [AdminBiodataController::class, 'fileImport'])->name('biodata-import');
Route::get('biodata-export', [AdminBiodataController::class, 'fileExport'])->name('biodata-export');

// pekerjaan
Route::get('pekerjaan-import-export', [AdminPekerjaanController::class, 'fileImportExport']);
Route::post('pekerjaan-import', [AdminPekerjaanController::class, 'fileImport'])->name('pekerjaan-import');
Route::get('pekerjaan-export', [AdminPekerjaanController::class, 'fileExport'])->name('pekerjaan-export');
