<?php

use App\Models\Biodata;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Route;
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
    $total = 0;
    $dataKuliah = [];
    $dataNama = [];
    $warnaBar = [];
    foreach ($biodatas as $biodata) {
        $selisih = $biodata->thnLulus - $biodata->thnMasuk;
        $dataKuliah[] = $selisih;
        $dataNama[] = $biodata->name;
        $total += $selisih;
        if($selisih > 6){
            $warnaBar[] = "#B70404";
        }else if($selisih < 5){
            $warnaBar[] = "#47A992";
        }else{
            $warnaBar[] = "#36A2EB";
        }
    }
    $avg = $total / count($biodatas);

    return view('home', [
        "title" => "home",
        "biodatas" => Biodata::all(),
        "dataLamaKuliah" => json_encode($dataKuliah),
        "rata2_kuliah" => $avg,
        "kelulusan_2020" => Biodata::where("thnLulus", "2020")->get(),
        "kelulusan_2021" => Biodata::where("thnLulus", "2021")->get(),
        "kelulusan_2022" => Biodata::where("thnLulus", "2022")->get(),
        "kelulusan_2023" => Biodata::where("thnLulus", "2023")->get(),
        "kelulusan_2024" => Biodata::where("thnLulus", "2024")->get(),
        "kelulusan_2025" => Biodata::where("thnLulus", "2025")->get(),
        "belumBekerja" => Biodata::where("pekerjaan", "belum")->get(),
        "sudahBekerja" => Biodata::where("pekerjaan", "sudah")->get(),
        "dataNama" => json_encode($dataNama),
        "warnaBar" => json_encode($warnaBar),

    ]);
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
Route::resource('/alumni/works', PekerjaanController::class)->middleware("auth");

