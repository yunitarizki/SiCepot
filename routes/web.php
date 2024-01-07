<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpjController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BASTController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\DataSPKController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LampiranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterLainController;
use App\Http\Controllers\DashboardMitraController;
use App\Http\Controllers\MasterKegiatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', [
        "active" => "home"
    ]);
})->middleware('auth');

Route::get('/daftar_mitra', [MitraController::class, 'index'])->middleware('auth');

Route::get('/daftar_kegiatan', [KegiatanController::class, 'index_home'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [LoginController::class, 'registrasi']);
Route::post('/create', [LoginController::class, 'create']);

Route::get('/dashboard', [DashboardMitraController::class, 'index'])->middleware('admin');

Route::get('/dashboard/mitra/daftar', [DashboardMitraController::class, 'daftar_mitra'])->middleware('admin');
Route::get('/dashboard/mitra/tambah', [DashboardMitraController::class, 'tambah'])->middleware('admin');
Route::resource('/dashboard/mitra', DashboardMitraController::class)->middleware('admin');
Route::get('/dashboard/mitra/download', [ExcelController::class, 'download'])->middleware('admin');

Route::resource('/user', UserController::class)->middleware('super_admin');

// Route::get('/dashboard/bank/daftar', [BankController::class, 'index'])->middleware('admin');
// Route::get('/dashboard/bank/tambah', [BankController::class, 'tambah'])->middleware('admin');
// Route::get('/dashboard/bank/edit', [BankController::class, 'edit'])->middleware('admin');
// Route::resource('/dashboard/bank', BankController::class)->middleware('admin');

Route::get('/dashboard/satuan/daftar', [SatuanController::class, 'index'])->middleware('admin');
Route::get('/dashboard/satuan/tambah', [SatuanController::class, 'tambah'])->middleware('admin');
Route::get('/dashboard/satuan/edit', [SatuanController::class, 'edit'])->middleware('admin');
Route::resource('/dashboard/satuan', SatuanController::class)->middleware('admin');

Route::get('/dashboard/kegiatan/daftar', [KegiatanController::class, 'index'])->middleware('admin');
Route::get('/dashboard/kegiatan/tambah', [KegiatanController::class, 'tambah'])->middleware('admin');
Route::get('/dashboard/kegiatan/edit', [KegiatanController::class, 'edit'])->middleware('admin');
Route::resource('/dashboard/kegiatan', KegiatanController::class)->middleware('admin');

Route::get('/dashboard/master_kegiatan/daftar', [MasterKegiatanController::class, 'index'])->middleware('admin');
Route::get('/dashboard/master_kegiatan/tambah', [MasterKegiatanController::class, 'tambah'])->middleware('admin');
Route::get('/master_kegiatan/edit/{id}', 'MasterKegiatanController@edit')->name('master_kegiatan.edit');
Route::resource('/dashboard/master_kegiatan', MasterKegiatanController::class)->middleware('admin');
Route::get('selectMitra', [MasterKegiatanController::class, 'mitra'])->name('mitra.index');
Route::get('selectKegiatan', [MasterKegiatanController::class, 'kegiatan'])->name('kegiatan.index');

Route::get('/dashboard/masterlain/daftar', [MasterLainController::class, 'index'])->middleware('admin');
Route::get('/dashboard/masterlain/tambah', [MasterLainController::class, 'tambah'])->middleware('admin');
Route::get('/dashboard/masterlain/edit', [MasterLainController::class, 'edit'])->middleware('admin');
Route::resource('/dashboard/masterlain', MasterLainController::class)->middleware('admin');

Route::get('/dashboard/data_spk/daftar', [DataSPKController::class, 'index'])->middleware('admin');
Route::get('/dashboard/data_spk/tambah', [DataSPKController::class, 'tambah'])->middleware('admin');
Route::get('/dashboard/data_spk/edit', [DataSPKController::class, 'edit'])->middleware('admin');
Route::resource('/dashboard/data_spk', DataSPKController::class)->middleware('admin');

Route::get('/dashboard/laporan/spj', [SpjController::class, 'index'])->middleware('admin');
Route:: get('/dashboard/laporan/cetakspj', [SpjController::class, 'cetaklampspj'])->middleware('admin');
Route:: get('/dashboard/laporan/cetakspj/{bulan}/{kegiatan_id}', [SpjController::class, 'cetaklaporanperbulan'])->middleware('admin');

Route::get('/dashboard/laporan/bast', [BASTController::class, 'index'])->middleware('admin');
Route:: get('/dashboard/laporan/cetakbast', [BASTController::class, 'cetakbast'])->middleware('admin');
Route:: get('/dashboard/laporan/cetakbast/{mitra_id}/{mulai}/{selesai}', [BASTController::class, 'cetaklappertanggal'])->middleware('admin');

Route:: get('/dashboard/laporan/lamp_spk', [SPKController::class, 'index'])->middleware('admin');
Route:: get('/dashboard/laporan/cetak', [SPKController::class, 'cetakForm'])->middleware('admin');
Route:: get('/dashboard/laporan/cetak/{mitra_id}/{mulai}/{selesai}', [SPKController::class, 'cetaklaporanpertanggal'])->middleware('admin');

Route::post('/mitra-import', [DashboardMitraController::class, 'import'])->middleware('admin');
Route::get('/mitra-export', [DashboardMitraController::class, 'export'])->middleware('admin');

Route::post('/kegiatan-import', [KegiatanController::class, 'import'])->middleware('admin');
Route::get('/kegiatan-export', [KegiatanController::class, 'export'])->middleware('admin');

Route::post('/masterkegiatan-import', [MasterKegiatanController::class, 'import'])->middleware('admin');
Route::get('/masterkegiatan-export', [MasterKegiatanController::class, 'export'])->middleware('admin');

Route::post('/masterlain-import', [MasterLainController::class, 'import'])->middleware('admin');
Route::get('/masterlain-export', [MasterLainController::class, 'export'])->middleware('admin');

Route::post('/dataspk-import', [DataSPKController::class, 'import'])->middleware('admin');
Route::get('/dataspk-export', [DataSPKController::class, 'export'])->middleware('admin');

