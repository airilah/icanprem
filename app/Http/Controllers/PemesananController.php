<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class PemesananController extends Controller
{

    public function beli_sekarang($id)
    {
        $userId = Auth::id(); // Get the ID of the logged-in user
        $keranjangCount = Keranjang::where('user_id', $userId)->count();


        return view('pesan', [
            'title' => 'paket',
            'paket'=> Paket::find($id),
            'produk'=> produk::find($id),
            'pembayaran' => Pembayaran::all(),
            'keranjangCount' => $keranjangCount,
        ]);
        
    }

    public function beli(Request $request)
    {
        $pemesanan=new Pemesanan;
        $pemesanan->user_id=$request->user_id;
        $pemesanan->paket_id=$request->paket_id;
        $pemesanan->pembayaran_id=$request->pembayaran_id;
        $pemesanan->keranjang_id=$request->keranjang_id;
        $pemesanan->jumlah_paket=$request->jumlah_paket;
        $pemesanan->metode_asal=$request->metode_asal;
        $pemesanan->rek_asal=$request->rek_asal;
        $pemesanan->total_harga=$request->total_harga;
        $pemesanan->bukti_pembayaran=$request->bukti_pembayaran;
        $pemesanan->status=$request->status;

        if ($request->hasFile('bukti_pembayaran')) {
            $fileName1 = $request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('assets/img/upload', $fileName1);
            $pemesanan->bukti_pembayaran = $fileName1;
        }

        $pemesanan->save();

        return redirect('/riwayat')->with("tambah_pemesanan", "Pemesanan berhasil dibuat!");
    }


    public function riwayat()
    {

        $userId = Auth::id();
        $keranjangCount = Keranjang::where('user_id', $userId)->count();
        $pesan = Pemesanan::select('*')->whereIn('status',['Terkirim','Proses'])->get();

        return view('riwayat', [
            'keranjangCount' => $keranjangCount,
            'keranjang' => Keranjang::all(),

            'pesan' => $pesan
        ]);
    }

    public function batal_pemesanan($id)
    {
        DB::table('pemesanans')->where('id',$id)->delete();
        return redirect('/daftar_antrian')->with('delete_pemesanan', "Pemesanan Berhasil Dibatalkan!");
    }



    public function daftar_antrian()
    {

        $pesan = Pemesanan::select('*')->whereIn('status',['Proses'])->get();

        return view('admin/antrian', [
            'keranjang' => Keranjang::all(),
            'user' => User::all(),
            'paket' => Paket::all(),
            'pembayaran' => Pembayaran::all(),
            'pesan' => $pesan
        ]);
    }

    public function tambah_antrian(Request $request)
    {
        // dd($request->all());
        $pemesanan=new Pemesanan;
        $pemesanan->user_id=$request->user_id;
        $pemesanan->paket_id=$request->paket_id;
        $pemesanan->pembayaran_id=$request->pembayaran_id;
        $pemesanan->keranjang_id=$request->keranjang_id;
        $pemesanan->jumlah_paket=$request->jumlah_paket;
        $pemesanan->metode_asal=$request->metode_asal;
        $pemesanan->rek_asal=$request->rek_asal;
        $pemesanan->total_harga=$request->total_harga;
        $pemesanan->status=$request->status;

        if ($request->hasFile('bukti_pembayaran')) {
            $fileName1 = $request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('assets/img/upload', $fileName1);
            $pemesanan->bukti_pembayaran = $fileName1;
        }

        $pemesanan->save();

        return redirect('/daftar_antrian')->with("tambah_pemesanan", "Pemesanan berhasil ditambah!");
    }


    public function daftar_penjualan()
    {
        $penjualan = Pemesanan::select('*')->where('status', ['Terkirim'])->get();
        return view('admin/penjualan',compact('penjualan'));
    }


    public function pesanankonfirmasi($id)
    {
        $pesanan = Pemesanan::find($id);

        if ($pesanan) {
            $paket = Paket::find($pesanan->paket_id);

            if ($paket) {
                $paket->stok -= $pesanan->jumlah_paket;
                $paket->save();
            }

            $pesanan->status = 'Terkirim';
            $pesanan->save();

            $user = $pesanan->user;
            $no_wa = $user->no_wa;

            $message = urlencode("Terima kasih telah memesan di Ican Premium!");

            // Set a flash message for success
            return redirect("https://wa.me/{$no_wa}?text={$message}")
                ->with('kirim_pemesanan', 'Pesanan berhasil dikonfirmasi dan stok telah diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }
    }






    public function cetak_laporan()
    {
        $riwayat = Pemesanan::select('*')->where('status', 'Terkirim')->get();
        return view('admin/export-laporan',compact('riwayat'));
    }



    public function kalender()
    {
        $riwayat = Pemesanan::select('*')->get();
        return view('admin/kalender');
    }
}
