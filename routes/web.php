<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AktorController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SliderController;

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

Route::group(['middleware' => ['auth', 'cekRole:customer']], function () {
    Route::get('/pesan/{id}', [PemesananController::class, 'pesan'])->name('pesan');
    Route::post('/masuk_keranjang', [KeranjangController::class, 'masuk_keranjang'])->name('masuk_keranjang');
    Route::get('/list_keranjang', [KeranjangController::class,'list_keranjang'])->name('list_keranjang');
    Route::get('/keranjang/{id}', [KeranjangController::class,'detele_keranjang'])->name('detele_keranjang');

    // Route::get('/aula1', [PaketController::class, 'hal_aula1'])->name('hal_aula1');
    // Route::get('/aula2', [PaketController::class, 'hal_aula2'])->name('hal_aula2');

    // Route::get('/tentang', [AnggotaController::class, 'anggota'])->name('anggota');
    // Route::get('/reservasi', [InformasiController::class, 'info_reservasi'])->name('info_reservasi');
    // Route::get('/pembayaran', [PembayaranController::class, 'hal_info_pembayaran'])->name('hal_info_pembayaran');

    // Route::get('/informasi/{id}', [PaketController::class, 'hal_ipaket'])->name('hal_ipaket');
    // Route::get('/pemesanan/{id}', [PemesananController::class, 'hal_pesan'])->name('hal_pesan');
    // Route::post('/tambah_pemesanan', [PemesananController::class, 'tambah_pemesanan'])->name('tambah_pemesanan');
    // Route::get('/riwayat', [PemesananController::class,'riwayat'])->name('riwayat');
    // Route::get('/riwayat/{id}/delete', [PemesananController::class,'delete_pemesanan'])->name('delete_pemesanan');
    // Route::post('/bukti/{id}', [PemesananController::class, 'bukti'])->name('bukti');
    // Route::get('/invoice/{id}', [PemesananController::class, 'invoice'])->name('invoice');
    // Route::get('/cetak_bukti/{id}', [PemesananController::class, 'cetak_butki'])->name('cetak_butki');

    Route::get('/profile/{id}/edit', [AktorController::class,'update_user'])->name('update_user');
    Route::post('/profile/{id}/edit', [AktorController::class, 'edit_gambar'])->name('edit_gambar');
    Route::post('/update_user', [AktorController::class,'edit_user'])->name('edit_user');
    Route::post('/profile/{id}/ubah_pw', [AktorController::class,'ubah_pw'])->name('ubah_pw');

});


Route::group(['middleware' => ['auth', 'cekRole:admin']], function () {
    Route::get('/admin', [AdminController::class,'dashboard'])->name('dashboard');
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
    Route::get('/antrian/{id}', [PemesananController::class, 'pesanankonfirmasi'])->name('pesanankonfirmasi');
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
// Route::get('/pemesanan_admin/{id}', [PemesananController::class, 'hal_pesan_admin'])->name('hal_pesan_admin');
// Route::post('/tambah_pemesanan_admin', [PemesananController::class, 'tambah_pemesanan_admin'])->name('tambah_pemesanan_admin');
// Route::get('/riwayat_admin', [PemesananController::class,'riwayat_admin'])->name('riwayat_admin');
// Route::get('/riwayat_admin/{id}/delete', [PemesananController::class,'delete_pemesanan_admin'])->name('delete_pemesanan_admin');
// Route::post('/bukti_admin/{id}', [PemesananController::class, 'bukti_admin'])->name('bukti_admin');
// Route::get('/invoice_admin/{id}', [PemesananController::class, 'invoice_admin'])->name('invoice_admin');
// Route::get('/cetak_bukti_admin/{id}', [PemesananController::class, 'cetak_butki_admin'])->name('cetak_butki_admin');

//     Route::get('/', [ProdukController::class, 'hal_utama'])->name('hal_utama');
