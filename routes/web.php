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
    Route::get('data', [KelolaPemasukanInventarisController::class, 'requestTimeIndex'])->name('data-pemasukan-inventaris');
    Route::get('data/{pemasukanInventarisId?}', [KelolaPemasukanInventarisController::class, 'pemasukanInventarisId'])->name('get-pemasukan-inventaris-id');
    Route::post('data/{pemasukanInventarisId}', [KelolaPemasukanInventarisController::class, 'update'])->name('update-pemasukan-inventaris');
    Route::delete('data/{pemasukanInventarisId}', [KelolaPemasukanInventarisController::class, 'destroy'])->name('destroy-pemasukan-inventaris');
});

Route::group([
    'as' => 'laporan-pemasukan-inventaris.',
    'prefix' => 'laporan-pemasukan-inventaris'
], function () {
    Route::get('report', [LaporanPemasukanInventarisController::class, 'index'])->name('report-pemasukan-inventaris');
    Route::get('getChartData', [LaporanPemasukanInventarisController::class, 'getChartData'])->name('getChart');
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
    Route::get('data', [KelolaPemasukanAyamController::class, 'requestTanggal'])->name('data-pemasukan-ayam');
    Route::get('data/{pemasukanAyamId?}', [KelolaPemasukanAyamController::class, 'pemasukanAyamId'])->name('get-pemasukan-ayam-id');
    Route::post('data/{pemasukanAyamId}', [KelolaPemasukanAyamController::class, 'updatePemasukanAyam'])->name('update-pemasukan-ayam');
    Route::delete('data/{pemasukanAyamId}', [KelolaPemasukanAyamController::class, 'destroyPemasukanAyam'])->name('destroy-pemasukan-ayam');
});

Route::group([
    'as' => 'laporan-pemasukan-ayam.',
    'prefix' => 'laporan-pemasukan-ayam'
], function () {
    Route::get('report', [LaporanPemasukanAyamController::class, 'index'])->name('report-pemasukan-ayam');
    Route::get('getChartData', [LaporanPemasukanAyamController::class, 'getChartData'])->name('getChart');
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
        //pengeluaran ayam
        Route::get('ayam/{kandangId}', [PengeluaranController::class, 'pengeluaranAyam'])->name('pengeluaran-ayam');
        Route::get('ayam/create/{kandangId}', [PengeluaranController::class, 'createPengeluaranAyam'])->name('create-pengeluaran-ayam');
        Route::post('ayam/create/{kandangId}', [PengeluaranController::class, 'storePengeluaranAyam'])->name('store-pengeluaran-ayam');
        Route::delete('ayam/delete/{pengeluaranAyamId}', [PengeluaranController::class, 'destroyPengeluaranAyam'])->name('destroy-pengeluaran-ayam');
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
    Route::get('data', [KelolaProduksiController::class, 'requestTanggal'])->name('request-tanggal');
    Route::get('data/{produksiId?}', [KelolaProduksiController::class, 'produksiId'])->name('get-produksi-id');
    Route::post('data/{produksiId}', [KelolaProduksiController::class, 'updateProduksi'])->name('update-produksi');
    Route::delete('data/{produksiId}', [KelolaProduksiController::class, 'destroyProduksi'])->name('destroy-produksi');
});

Route::group([
    'as' => 'laporan-produksi.',
    'prefix' => 'laporan-produksi',
], function () {
    Route::get('report', [LaporanProduksiController::class, 'index'])->name('report');
    Route::get('getChartData', [LaporanProduksiController::class, 'getChartData'])->name('getChart');
});
