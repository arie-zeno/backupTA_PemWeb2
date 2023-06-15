<?php

use App\Models\Biodata;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\AlumniPostController;
use App\Http\Controllers\AlumniBiodataController;

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

    $avg = $total / count($biodatas);
    
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
// Route::get('/alumni/works}', [WorkController::class, 'index']);
// Route::get('/alumni/works/{work}', [WorkController::class, 'show']);
