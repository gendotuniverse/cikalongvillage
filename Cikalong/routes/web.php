<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TentangController;
use App\Http\Controllers\Admin\DataUmumController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SumberdayaController;
use App\Http\Controllers\Admin\PemerintahanController;
use App\Http\Controllers\Admin\FasilitasDesaController;
use App\Http\Controllers\Admin\KategoriJudulController;
use App\Http\Controllers\Admin\SubKategoriJudulController;
use App\Http\Controllers\DataUmum;

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
Route::get('tentang', [HomeController::class, 'tentang'])->name('tentang');
// data umum
Route::get('data-umum', [DataUmum::class, 'index'])->name('index');
Route::get('data-umum/detail/{id}', [DataUmum::class, 'detail'])->name('detail.umum');
// data umum

Route::get('profil/detail/{id}', [HomeController::class, 'detail_profil'])->name('profil.detail');
Route::get('pelayanan', [HomeController::class, 'pelayanan'])->name('pelayanan');
Route::get('pelayanan/detail/{id}', [HomeController::class, 'detail_pelayanan'])->name('pelayanan.detail');
Route::get('berita', [HomeController::class, 'berita'])->name('berita');
Route::get('berita/detail/{id}', [HomeController::class, 'detail_berita'])->name('berita.detail');
Route::get('produk', [HomeController::class, 'produk'])->name('produk');
Route::get('produk/detail/{id}', [HomeController::class, 'detail_produk'])->name('produk.detail');
Route::get('fasilitas_desa', [HomeController::class, 'fasilitas_desa'])->name('fasilitas_desa');
Route::get('fasilitas_desa/detail/{id}', [HomeController::class, 'detail_fasilitas_desa'])->name('fasilitas_desa.detail');
Route::get('sumberdaya', [HomeController::class, 'sumberdaya'])->name('sumberdaya');
Route::get('sumberdaya/detail/{id}', [HomeController::class, 'detail_sumberdaya'])->name('sumberdaya.detail');
Route::get('kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('proseskontak', [HomeController::class, 'proses_kontak'])->name('proseskontak');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('prosesLogin');
Route::get('logout/{slug}', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::put('admin/profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    // data umum
    Route::resource('admin/kategori-judul', KategoriJudulController::class)->names([
        'destroy' => 'kategori.destroy',
    ]);
    Route::resource('admin/sub-kategori-judul', SubKategoriJudulController::class)->names([
        'destroy' => 'subkategori.destroy',
    ]);

    Route::get('/get-sub-kategori', [DataUmumController::class, 'getSubKategoriByKategori'])->name('data-umum.get-sub-kategori');
    Route::resource('admin/data-umum', DataUmumController::class)->names([
        'destroy' => 'dataumum.destroy',
    ]);
    // data umum

    Route::get('admin/kontak', [KontakController::class, 'index'])->name('admin.kontak');
    Route::get('admin/kontak/getListData', [KontakController::class, 'listData'])->name('admin.kontak.list');
    Route::get('admin/kontak/delete/{id}', [KontakController::class, 'destroy'])->name('admin.kontak.delete');

    Route::get('admin/slider', [SliderController::class, 'index'])->name('admin.slider');
    Route::get('admin/slider/getListData', [SliderController::class, 'listData'])->name('admin.slider.list');
    Route::get('admin/slider/add', [SliderController::class, 'create'])->name('admin.slider.add');
    Route::post('admin/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('admin/slider/edit/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
    Route::put('admin/slider/update/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
    Route::get('admin/slider/delete/{id}', [SliderController::class, 'destroy'])->name('admin.slider.delete');

    Route::get('admin/sumberdaya', [SumberdayaController::class, 'index'])->name('admin.sumberdaya');
    Route::get('admin/sumberdaya/getListData', [SumberdayaController::class, 'listData'])->name('admin.sumberdaya.list');
    Route::get('admin/sumberdaya/add', [SumberdayaController::class, 'create'])->name('admin.sumberdaya.add');
    Route::post('admin/sumberdaya/store', [SumberdayaController::class, 'store'])->name('admin.sumberdaya.store');
    Route::get('admin/sumberdaya/edit/{id}', [SumberdayaController::class, 'edit'])->name('admin.sumberdaya.edit');
    Route::put('admin/sumberdaya/update/{id}', [SumberdayaController::class, 'update'])->name('admin.sumberdaya.update');
    Route::get('admin/sumberdaya/delete/{id}', [SumberdayaController::class, 'destroy'])->name('admin.sumberdaya.delete');

    Route::get('admin/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::get('admin/produk/getListData', [ProdukController::class, 'listData'])->name('admin.produk.list');
    Route::get('admin/produk/add', [ProdukController::class, 'create'])->name('admin.produk.add');
    Route::post('admin/produk/store', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('admin/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('admin/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::get('admin/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.delete');

    Route::get('admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('admin/galeri/getListData', [GaleriController::class, 'listData'])->name('admin.galeri.list');
    Route::get('admin/galeri/add', [GaleriController::class, 'create'])->name('admin.galeri.add');
    Route::post('admin/galeri/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('admin/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('admin/galeri/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::get('admin/galeri/delete/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.delete');

    Route::get('admin/pemerintahan', [PemerintahanController::class, 'index'])->name('admin.pemerintahan');
    Route::get('admin/pemerintahan/getListData', [PemerintahanController::class, 'listData'])->name('admin.pemerintahan.list');
    Route::get('admin/pemerintahan/add', [PemerintahanController::class, 'create'])->name('admin.pemerintahan.add');
    Route::post('admin/pemerintahan/store', [PemerintahanController::class, 'store'])->name('admin.pemerintahan.store');
    Route::get('admin/pemerintahan/edit/{id}', [PemerintahanController::class, 'edit'])->name('admin.pemerintahan.edit');
    Route::put('admin/pemerintahan/update/{id}', [PemerintahanController::class, 'update'])->name('admin.pemerintahan.update');
    Route::get('admin/pemerintahan/delete/{id}', [PemerintahanController::class, 'destroy'])->name('admin.pemerintahan.delete');

    Route::get('admin/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('admin/berita/getListData', [BeritaController::class, 'listData'])->name('admin.berita.list');
    Route::get('admin/berita/add', [BeritaController::class, 'create'])->name('admin.berita.add');
    Route::post('admin/berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('admin/berita/edit/{id}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('admin/berita/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::get('admin/berita/delete/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');

    Route::get('admin/layanan', [LayananController::class, 'index'])->name('admin.layanan');
    Route::get('admin/layanan/getListData', [LayananController::class, 'listData'])->name('admin.layanan.list');
    Route::get('admin/layanan/add', [LayananController::class, 'create'])->name('admin.layanan.add');
    Route::post('admin/layanan/store', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::get('admin/layanan/edit/{id}', [LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('admin/layanan/update/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::get('admin/layanan/delete/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.delete');

    Route::get('admin/fasilitas_desa', [FasilitasDesaController::class, 'index'])->name('admin.fasilitas_desa');
    Route::get('admin/fasilitas_desa/getListData', [FasilitasDesaController::class, 'listData'])->name('admin.fasilitas_desa.list');
    Route::get('admin/fasilitas_desa/add', [FasilitasDesaController::class, 'create'])->name('admin.fasilitas_desa.add');
    Route::post('admin/fasilitas_desa/store', [FasilitasDesaController::class, 'store'])->name('admin.fasilitas_desa.store');
    Route::get('admin/fasilitas_desa/edit/{id}', [FasilitasDesaController::class, 'edit'])->name('admin.fasilitas_desa.edit');
    Route::put('admin/fasilitas_desa/update/{id}', [FasilitasDesaController::class, 'update'])->name('admin.fasilitas_desa.update');
    Route::get('admin/fasilitas_desa/delete/{id}', [FasilitasDesaController::class, 'destroy'])->name('admin.fasilitas_desa.delete');

    Route::get('admin/tentang', [TentangController::class, 'index'])->name('admin.tentang');
    Route::get('admin/tentang/getListData', [TentangController::class, 'listData'])->name('admin.tentang.list');
    Route::get('admin/tentang/add', [TentangController::class, 'create'])->name('admin.tentang.add');
    Route::post('admin/tentang/store', [TentangController::class, 'store'])->name('admin.tentang.store');
    Route::get('admin/tentang/edit/{id}', [TentangController::class, 'edit'])->name('admin.tentang.edit');
    Route::get('admin/tentang/delete/{id}', [TentangController::class, 'destroy'])->name('admin.tentang.delete');
    Route::put('admin/tentang/update/{id}', [TentangController::class, 'update'])->name('admin.tentang.update');

    Route::get('admin/setting', [SettingController::class, 'index'])->name('admin.setting');
    Route::get('admin/setting/getListData', [SettingController::class, 'listData'])->name('admin.setting.list');
    Route::get('admin/setting/add', [SettingController::class, 'create'])->name('admin.setting.add');
    Route::post('admin/setting/store', [SettingController::class, 'store'])->name('admin.setting.store');
    Route::get('admin/setting/edit/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('admin/setting/update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');
});
