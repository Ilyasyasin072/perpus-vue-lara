<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnggotaController;
use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\PetugasController;
use App\Http\Controllers\Api\RakController;
use App\Http\Controllers\Api\PengembalianController;
use App\Http\Controllers\Api\PeminjamanController;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Storage;
use Validator;
use Carbon\Carbon;
use Image;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

header('Access-Control-Allow-Origin: *');
// header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
header( 'Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods:*');

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::group(['prefix' => 'anggota'], function () {
        Route::get('/', [AnggotaController::class, 'index'])->name('anggota-index');
        Route::post('/store', [AnggotaController::class, 'store'])->name('anggota-store');
        Route::get('/show/{id}', [AnggotaController::class, 'show'])->name('anggota-show');
        Route::put('/update/{id}', [AnggotaController::class, 'update'])->name('anggota-update');
        Route::delete('/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota-destroy');
    });

    Route::group(['prefix' => 'buku'], function () {
        Route::get('/', [BukuController::class, 'index'])->name('buku-index');
        Route::post('/store', [BukuController::class, 'store'])->name('buku-store');
        Route::get('/show/{id}', [BukuController::class, 'show'])->name('buku-show');
        Route::put('/update/{id}', [BukuController::class, 'update'])->name('buku-update');
        Route::delete('/delete/{id}', [BukuController::class, 'destroy'])->name('buku-delete');
    });

    Route::group(['prefix' => 'petugas'], function () {
        Route::get('/', [PetugasController::class, 'index'])->name('petugas-index');
        Route::post('/store', [PetugasController::class, 'store'])->name('petugas-store');
        Route::get('/show/{id}', [PetugasController::class, 'show'])->name('petugas-show');
        Route::delete('/delete/{id}', [PetugasController::class, 'destroy'])->name('petugas-delete');
    });

    Route::group(['prefix' => 'rak'], function () {
        Route::get('/', [RakController::class, 'index'])->name('rak-index');
        Route::post('/store', [RakController::class, 'store'])->name('rak-store');
        Route::get('/show/{id}', [RakController::class, 'show'])->name('rak-show');
    });

    Route::group(['prefix' => 'pengembalian'], function () {
        Route::get('/', [PengembalianController::class, 'index'])->name('pengembalian-index');
        Route::get('/check/{id}', [PengembalianController::class, 'pinjaman'])->name('pengembalian-check');
    });

    Route::group(['prefix' => 'peminjaman'], function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman-index');
    });

    Route::group(['prefix' => 'laporan'], function () {
        Route::get('/', [LaporanController::class, 'index'])->name('laporan-index');
    });

});
