<?php

use App\Http\Controllers\AyamController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\KelolaPemasukanAyamController;
use App\Http\Controllers\KelolaPemasukanInventarisController;
use App\Http\Controllers\KelolaProduksiController;
use App\Http\Controllers\LaporanPemasukanAyamController;
use App\Http\Controllers\LaporanPemasukanInventarisController;
use App\Http\Controllers\LaporanProduksiController;
use App\Http\Controllers\PemasukanAyamController;
use App\Http\Controllers\PemasukanInventarisController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProduksiController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('ayam', AyamController::class);
Route::resource('kandang', KandangController::class);
Route::resource('inventaris', InventarisController::class);
Route::resource('barang', BarangController::class);

Route::group([
    'as' => 'pemasukan-inventaris.',
    'prefix' => 'pemasukan-inventaris'
], function () {
    Route::get('data-new', [PemasukanInventarisController::class, 'create'])->name('data-new');
    Route::post('data-new', [PemasukanInventarisController::class, 'store'])->name('store-data-new');
});
Route::group([
    'as' => 'kelola-pemasukan-inventaris.',
    'prefix' => 'kelola-pemasukan-inventaris'
], function () {
    Route::get('time-index', [KelolaPemasukanInventarisController::class, 'timeIndex'])->name('time-index');
    Route::post('time-index', [KelolaPemasukanInventarisController::class, 'requestTimeIndex'])->name('request-time-index');
    Route::get('time-index/edit/{id}', [KelolaPemasukanInventarisController::class, 'edit'])->name('edit-pemasukan-inventaris');
    Route::post('time-index/edit/{id}', [KelolaPemasukanInventarisController::class, 'update'])->name('update-pemasukan-inventaris');
    Route::delete('time-index/delete/{id}', [KelolaPemasukanInventarisController::class, 'destroy'])->name('destroy-pemasukan-inventaris');
});

Route::group([
    'as' => 'laporan-pemasukan-inventaris.',
    'prefix' => 'laporan-pemasukan-inventaris'
], function () {
    Route::get('report', [LaporanPemasukanInventarisController::class, 'index'])->name('report-pemasukan-inventaris');
});

Route::group([
    'as' => 'pemasukan-ayam.',
    'prefix' => 'pemasukan-ayam'
], function () {
    Route::get('new-data-ayam', [PemasukanAyamController::class, 'create'])->name('new-data-ayam');
    Route::post('new-data-ayam', [PemasukanAyamController::class, 'store'])->name('store-new-data-ayam');
});

Route::group([
    'as' => 'kelola-pemasukan-ayam.',
    'prefix' => 'kelola-pemasukan-ayam'
], function () {
    Route::get('form-tanggal', [KelolaPemasukanAyamController::class, 'formTanggal'])->name('form-tanggal');
    Route::post('form-tanggal', [KelolaPemasukanAyamController::class, 'requestTanggal'])->name('request-tanggal');
});

Route::group([
    'as' => 'laporan-pemasukan-ayam.',
    'prefix' => 'laporan-pemasukan-ayam'
], function () {
    Route::get('report', [LaporanPemasukanAyamController::class, 'index'])->name('report-pemasukan-ayam');
});

Route::group(
    [
        'as' => 'pengeluaran.',
        'prefix' => 'pengeluaran'
    ],
    function () {
        Route::get('index-ayam', [PengeluaranController::class, 'indexAyam'])->name('index-ayam');
        Route::get('index-kandang/{ayamId}', [PengeluaranController::class, 'indexKandang'])->name('index-kandang');
        Route::get('barang-inventaris/{kandangId}', [PengeluaranController::class, 'barangInventaris'])->name('barang-inventaris');
        //route pengeluaran barang
        Route::get('barang/{kandangId}', [PengeluaranController::class, 'pengeluaranBarang'])->name('pengeluaran-barang');
        Route::get('barang/create/{kandangId}', [PengeluaranController::class, 'createPengeluaranBarang'])->name('create-pengeluaran-barang');
        Route::post('barang/create/{kandangId}', [PengeluaranController::class, 'postPengeluaranBarang'])->name('post-pengeluaran-barang');
        Route::get('barang/edit/{kandangId}/{pengeluaranBarangId}', [PengeluaranController::class, 'editPengeluaranBarang'])->name('edit-pengeluaran-barang');
        Route::post('barang/edit/{kandangId}/{pengeluaranBarangId}', [PengeluaranController::class, 'updatePengeluaranBarang'])->name('update-pengeluaran-barang');
        Route::delete('barang/edit/{kandangId}/{pengeluaranBarangId}', [PengeluaranController::class, 'destroyPengeluaranBarang'])->name('destroy-pengeluaran-barang');
        //pengeluaran inventaris
        Route::get('inventaris/{kandangId}', [PengeluaranController::class, 'pengeluaranInventaris'])->name('pengeluaran-inventaris');
        Route::get('inventaris/create/{kandangId}', [PengeluaranController::class, 'createPengeluaranInventaris'])->name('create-pengeluaran-inventaris');
        Route::post('inventaris/create/{kandangId}', [PengeluaranController::class, 'postPengeluaranInventaris'])->name('post-pengeluaran-inventaris');
        Route::get('inventaris/edit/{kandangId}/{pengeluaranInventarisId}', [PengeluaranController::class, 'editPengeluaranInventaris'])->name('edit-pengeluaran-inventaris');
        Route::post('inventaris/edit/{kandangId}/{pengeluaranInventarisId}', [PengeluaranController::class, 'updatePengeluaranInventaris'])->name('update-pengeluaran-inventaris');
        Route::delete('inventaris/delete/{kandangId}/{pengeluaranInventarisId}', [PengeluaranController::class, 'destroyPengeluaranInventaris'])->name('destroy-pengeluaran-inventaris');
    }
);

Route::group([
    'as' => 'produksi.',
    'prefix' => 'produksi'
], function () {
    Route::get('create', [ProduksiController::class, 'create'])->name('create-produksi');
    Route::post('store', [ProduksiController::class, 'store'])->name('store-produksi');
});

Route::group([
    'as' => 'kelola-produksi.',
    'prefix' => 'kelola-produksi'
], function () {
    Route::get('form-tanggal', [KelolaProduksiController::class, 'formTanggal'])->name('form-tanggal');
    Route::post('data', [KelolaProduksiController::class, 'requestTanggal'])->name('request-tanggal');
});

Route::group([
    'as' => 'laporan-produksi.',
    'prefix' => 'laporan-produksi',
], function () {
    Route::get('report', [LaporanProduksiController::class, 'index'])->name('report');
});
