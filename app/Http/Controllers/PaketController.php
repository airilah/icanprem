<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function informasi($id)
    {
        $userId = Auth::id(); // Get the ID of the logged-in user
        $keranjangCount = Keranjang::where('user_id', $userId)->count();

        $produk = Produk::with('paket')->find($id);

        // Check if $produk->paket is a collection
        return view('informasi', [
            'title' => 'paket',
            'paket' => $produk->paket,
            'produk' => $produk,
            'keranjangCount' => $keranjangCount,
            'user_id' => $userId,
        ]);
    }



    // public function tambah_keranjang(Request $request)
    // {
    //     {
    //         $keranjang=new Keranjang;
    //         $keranjang->user_id=$request->user_id;
    //         $keranjang->paket_id=$request->paket_id;
    //         $keranjang->save();

    //         return redirect('/pesan/{id}')->with("tambah_keranjang","Berhasil masuk keranjang!");
    //     }
    // }

    // public function index()
    // {
    //     return view('paket', [
    //         'title' => 'Paket',
    //         'paket' => Paket::all(),
    //     ]);
    // }

    public function daftar_paket()
    {
        // $pakets = Paket::with('produk')->get();
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

    // public function edit_paket1($id, Request $request)
    // {
    //     $paket = Paket::find($id);
    //     $paket->update($request->except(['token', 'submit']));
    //     if ($paket->save()){
    //         return redirect('/paket')->with('edit_paket', 'paket Berhasil Diupdate');
    //     }
    // }



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
