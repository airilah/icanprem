<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{

    public function informasi($id)
    {
        $userId = Auth::id();
        $keranjangCount = Keranjang::where('user_id', $userId)->count();

        $produk = Produk::with('paket')->find($id);

        return view('informasi', [
            'title' => 'paket',
            'paket' => $produk->paket,
            'produk' => $produk,
            'keranjangCount' => $keranjangCount,
            'user_id' => $userId,
        ]);
    }
    public function daftar_paket()
    {
        return view('admin/paket', [
            'title' => 'paket',
            'paket' => Paket::all(),
            'produk' => Produk::all(),
        ]);
    }

    public function tambah_paket(Request $request)
    {
        $paket = Paket::create($request->except(['token', 'submit']));
        if($request->has(('gambar'))){
            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $paket->gambar = $request->file('gambar')->getClientOriginalName();
            $paket->save();
        }
        if ($paket->save()) {
            return redirect('/paket')->with('tambah_paket', 'Paket Berhasil Ditambah!');
        };
    }

    public function delete_paket($id)
    {
        Paket::find($id)->delete();
        return redirect()->back()->with("delete_paket","Paket Berhasil di Hapus");
    }


    public function update_paket($id)
    {
        return view('admin/update/update_paket', [
            'title' => 'Update Paket',
            'paket'=> Paket::find($id),
            'produk'=> produk::all()
        ]);
    }


    public function edit_paket(Request $request)
    {
        $paket = Paket::find($request->id);
        $paket->produk_id = $request->produk_id;
        $paket->nama_paket = $request->nama_paket;
        $paket->catatan = $request->catatan;
        $paket->stok = $request->stok;
        $paket->harga = $request->harga;

        if ($paket->save()) {
            return redirect('/paket')->with("edit_paket", "Berhasil Diupdate!");
        } else {
            // Handle the case where the save fails
            return redirect('/paket')->with("edit_paket", "Gagal Diupdate!");
        }
    }
}
