<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pesan($id)
    {
        $pesan = Pemesanan::with(['user', 'paket', 'keranjang', 'pembayaran'])->find($id);

        if (!$pesan) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }

        return view('pemesanan', [
            'title' => 'paket',
            'user' => $pesan->user,
            'paket' => $pesan->paket,
            'keranjang' => $pesan->keranjang,
            'pembayaran' => $pesan->pembayaran,
            'pesan' => $pesan,
        ]);
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
        // Retrieve the order details including the user who placed the order
        $pesanan = Pemesanan::find($id);

        // Update the status to 'Terkirim'
        $pesanan->update(['status' => 'Terkirim']);

        // Get the user's phone number
        $user = $pesanan->user;
        $no_wa = $user->no_wa;

        // Message to be sent on WhatsApp
        $message = urlencode("Terima kasih telah memesan di Ican Premium!");

        // Redirect to WhatsApp with the message
        return redirect("https://wa.me/{$no_wa}?text={$message}");
    }



    public function cetak_laporan()
    {
        $riwayat = Pemesanan::select('*')->where('status', 'Terkirim')->get();
        return view('admin/export-laporan',compact('riwayat'));
    }

    public function delete_pemesanan($id)
    {
        DB::table('pemesanans')->where('id',$id)->delete();
        return redirect('/daftar_antrian')->with('delete_pemesanan', "Pemesanan Berhasil Dihapus!");
    }

    public function kalender()
    {
        $riwayat = Pemesanan::select('*')->get();
        return view('admin/kalender');
    }
}
