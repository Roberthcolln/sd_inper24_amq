<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsentrasiController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UnitBisnisController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\SubKategoriKegiatanController;
use App\Http\Controllers\DaftarKegiatanController;
use App\Http\Controllers\IventarisController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WeatherController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/programm', [HomeController::class, 'programm'])->name('programm');
Route::get('/kegiatann', [HomeController::class, 'kegiatann'])->name('kegiatann');
Route::get('/galerii', [HomeController::class, 'galerii'])->name('galerii');
Route::get('/fasilitas', [HomeController::class, 'fasilitas'])->name('fasilitas');
Route::get('/guruu', [HomeController::class, 'guruu'])->name('guruu');
Route::get('/kelass', [HomeController::class, 'kelass'])->name('kelass');
Route::get('/siswaa', [HomeController::class, 'siswaa'])->name('siswaa');
Route::get('/tentang_team', [HomeController::class, 'tentang_team'])->name('tentang_team');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/read/{slug}', [HomeController::class, 'read'])->name('read');
Route::get('lihat-program/{slug}', [HomeController::class, 'lihatprogram']);
Route::get('lihat-kegiatan/{slug}', [HomeController::class, 'lihatkegiatan']);
Route::get('lihat-siswa/{slug}', [HomeController::class, 'lihatsiswa']);
Route::get('/project/detail-project/{slug}', [HomeController::class, 'detailproject']);
Route::get('lihat-project', [HomeController::class, 'lihatproject']);
Route::get('/support', [HomeController::class, 'support']);
Route::get('/lihat-partner', [HomeController::class, 'lihatpartner']);
Route::get('/lihat-konsentrasi', [HomeController::class, 'lihatkonsentrasi']);
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/weather', [WeatherController::class, 'getWeather']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::resource('galeri', GaleriController::class);
    Route::post('image-upload', [GaleriController::class, 'storeImage'])->name('image.upload');
    Route::resource('setting', SettingController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('home', HomeController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('rekening', RekeningController::class);
    Route::resource('unit_bisnis', UnitBisnisController::class);
    Route::resource('konsentrasi', KonsentrasiController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('diskon', DiskonController::class);
    Route::resource('team', TeamController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('kategori_kegiatan', KategoriKegiatanController::class);
    Route::resource('sub_kategori_kegiatan', SubKategoriKegiatanController::class);
    Route::post('api/fetch-kegiatan', [SubKategoriKegiatanController::class, 'fetchKegiatan']);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('daftar_kegiatan', DaftarKegiatanController::class);
    Route::resource('iventaris', IventarisController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);

});
