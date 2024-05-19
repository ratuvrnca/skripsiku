<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\RangeNilaiController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RocController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/home', function () {
        return view('pages.homepage.index');
    })->name('home');

    Route::resource('/user', UserController::class);
    Route::post('/matriks/import', [AlternatifController::class, 'import'])->name('alternatif.import');
    Route::resource('/kriteria', KriteriaController::class);
    Route::resource('/alternatif', AlternatifController::class);
    Route::post('/matriks/remove-all', [MatriksController::class, 'destroyAll'])->name('matriks.destroy-all');
    Route::resource('/matriks', MatriksController::class);
    Route::resource('/rangenilai', RangeNilaiController::class);
    Route::post('/normalisasikan', [NormalisasiController::class, 'normalisasi'])->name('normalisasikan');
    Route::post('/normalisasikan-2', [NormalisasiController::class, 'normalisasi2'])->name('normalisasikan.step2');
    Route::post('/normalisasikan-3', [NormalisasiController::class, 'normalisasi3'])->name('normalisasikan.step3');
    Route::post('/normalisasikan-terbobot', [NormalisasiController::class, 'normalisasiTerbobot'])->name('normalisasikan.terbobot');
    Route::post('/yimax', [NormalisasiController::class, 'yiMax'])->name('yimax');
    Route::post('/matriks-result', [NormalisasiController::class, 'result'])->name('matriks.result');
    Route::post('/result/destroy', [NormalisasiController::class, 'destroy'])->name('destroy');
    Route::resource('/result', ResultController::class);

    Route::get('/roc/index', [RocController::class, 'index'])->name('roc.index');
    Route::post('/roc/sorting', [RocController::class, 'sorting'])->name('roc.sorting');
    Route::post('/roc/hitung', [RocController::class, 'hitung'])->name('roc.hitung');
    Route::post('/roc/reset', [RocController::class, 'reset'])->name('roc.reset');
});
