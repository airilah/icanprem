<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AktorController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;

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


Route::get('/', [ProdukController::class, 'index'])->name('index');
Route::post('/login', [AktorController::class, 'login'])->name('login');
Route::post('/tambah_user', [AktorController::class, 'tambah_user'])->name('tambah_user');
Route::get('/logout', [AktorController::class, 'logout'])->name('logout');
Route::get('/informasi/{id}', [PaketController::class, 'informasi'])->name('informasi');
Route::get('/informasi_beli', [InformasiController::class, 'informasi_beli'])->name('informasi_beli');
Route::get('/informasi_bayar', [PembayaranController::class, 'informasi_bayar'])->name('informasi_bayar');


Route::group(['middleware' => ['auth', 'cekRole:customer']], function () {
    Route::post('/beli', [PemesananController::class, 'beli'])->name('beli');
    Route::get('/beli_sekarang/{id}', [PemesananController::class, 'beli_sekarang'])->name('beli_sekarang');
    Route::get('/riwayat', [PemesananController::class,'riwayat'])->name('riwayat');
    Route::get('/riwayat/{id}', [PemesananController::class,'batal_pemesanan'])->name('batal_pemesanan');

    Route::post('/masuk_keranjang', [KeranjangController::class, 'masuk_keranjang'])->name('masuk_keranjang');
    Route::get('/list_keranjang', [KeranjangController::class,'list_keranjang'])->name('list_keranjang');
    Route::get('/hapus_keranjang/{id}', [KeranjangController::class,'hapus_keranjang'])->name('hapus_keranjang');
    Route::get('/checkout/{id}', [KeranjangController::class,'checkout'])->name('checkout');

    Route::get('/info_beli', [InformasiController::class, 'info_beli'])->name('info_beli');
    Route::get('/info_bayar', [PembayaranController::class, 'info_bayar'])->name('info_bayar');

    Route::get('/profile/{id}/edit', [AktorController::class,'update_user'])->name('update_user');
    Route::post('/profile/{id}/edit', [AktorController::class, 'edit_gambar'])->name('edit_gambar');
    Route::post('/update_user', [AktorController::class,'edit_user'])->name('edit_user');
    Route::post('/profile/{id}/ubah_pw', [AktorController::class,'ubah_pw'])->name('ubah_pw');

});


Route::group(['middleware' => ['auth', 'cekRole:admin']], function () {
    Route::get('/admin', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/profile_admin', [AktorController::class,'profile_admin'])->name('profile_admin');
    Route::post('/edit_admin', [AktorController::class,'edit_admin'])->name('edit_admin');

    Route::get('/paket', [PaketController::class,'daftar_paket'])->name('daftar_paket');
    Route::post('/tambah_paket', [PaketController::class,'tambah_paket'])->name('tambah_paket');
    Route::post('/paket/{id}', [PaketController::class, 'edit_paket'])->name('edit_paket');
    Route::get('/paket/{id}', [PaketController::class, 'delete_paket'])->name('delete_paket');

    Route::get('/produk', [ProdukController::class,'daftar_produk'])->name('daftar_produk');
    Route::post('/tambah_produk', [ProdukController::class,'tambah_produk'])->name('tambah_produk');
    Route::post('/produk/{id}', [ProdukController::class, 'edit_produk'])->name('edit_produk');
    Route::get('/produk/{id}', [ProdukController::class, 'delete_produk'])->name('delete_produk');

    Route::get('/daftar_pembayaran', [PembayaranController::class,'daftar_pembayaran'])->name('daftar_pembayaran');
    Route::post('/tambah_pembayaran', [PembayaranController::class,'tambah_pembayaran'])->name('tambah_pembayaran');
    Route::post('/pembayaran/{id}', [PembayaranController::class, 'edit_pembayaran'])->name('edit_pembayaran');
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'delete_pembayaran'])->name('delete_pembayaran');

    Route::get('/pemesanan', [PemesananController::class,'daftar_pemesanan'])->name('daftar_pemesanan');
    Route::get('/pemesanan/{id}/edit', [PemesananController::class,'edit_pemesanan'])->name('edit_pemesanan');

    Route::get('/keranjang', [KeranjangController::class,'daftar_keranjang'])->name('daftar_keranjang');
    Route::post('/tambah_keranjang', [KeranjangController::class,'tambah_keranjang'])->name('tambah_keranjang');
    Route::post('/keranjang/{id}', [KeranjangController::class,'edit_keranjang'])->name('edit_keranjang');
    Route::get('/keranjang/{id}', [KeranjangController::class,'delete_keranjang'])->name('delete_keranjang');

    Route::get('/daftar_antrian', [PemesananController::class,'daftar_antrian'])->name('daftar_antrian');
    Route::post('/tambah_antrian', [PemesananController::class,'tambah_antrian'])->name('tambah_antrian');
    Route::get('/daftar_laporan', [PemesananController::class,'daftar_laporan'])->name('daftar_laporan');
    Route::get('pesanankonfirmasi/{id}', [PemesananController::class, 'pesanankonfirmasi'])->name('pesanankonfirmasi');
    Route::get('/antrian/{id}', [PemesananController::class, 'delete_pemesanan'])->name('delete_pemesanan');

    Route::get('/penjualan', [PemesananController::class,'daftar_penjualan'])->name('daftar_penjualan');
    Route::get('/cetak_laporan', [PemesananController::class,'cetak_laporan'])->name('cetak_laporan');

    Route::get('/akun_admin', [AktorController::class,'akun_admin'])->name('akun_admin');
    Route::get('/akun_cust', [AktorController::class,'akun_cust'])->name('akun_cust');
    Route::post('/tambah_admin', [AktorController::class,'tambah_admin'])->name('tambah_admin');
    Route::get('/akun/{id}/edit', [AktorController::class,'update_akun'])->name('update_akun');
    Route::post('/akun/{id}/update_akun', [AktorController::class,'edit_akun'])->name('edit_akun');
    Route::get('/akun/{id}/delete', [AktorController::class,'delete_akun'])->name('delete_akun');


    Route::get('/daftar_slider', [SliderController::class,'daftar_slider'])->name('daftar_slider');
    Route::post('/tambah_slider', [SliderController::class,'tambah_slider'])->name('tambah_slider');
    Route::post('/slider/{id}', [SliderController::class,'edit_slider'])->name('edit_slider');
    Route::get('/slider/{id}', [SliderController::class,'delete_slider'])->name('delete_slider');

});
