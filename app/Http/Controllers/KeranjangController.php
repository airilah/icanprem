<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function list_keranjang()
    {
        $userId = Auth::id();
        $keranjang = Keranjang::where('user_id', $userId)->get();
        $keranjangCount = Keranjang::where('user_id', $userId)->count();

        return view('list_keranjang', [
            'title' => 'Keranjang',
            'keranjang' => $keranjang,
            'keranjangCount' => $keranjangCount,
            'user' => Auth::user(),
            'paket' => Paket::all(),
        ]);
    }

    public function masuk_keranjang(Request $request)
    {
        $keranjang = new Keranjang;
        $keranjang->user_id = $request->user_id;
        $keranjang->paket_id = $request->paket_id;
        $keranjang->jumlah_paket = $request->jumlah_paket;
        $keranjang->harga = str_replace('Rp ', '', $request->harga); // Convert to number if needed
        $keranjang->save();

        // Redirect user to appropriate page
        return redirect('/list_keranjang')->with("masuk_keranjang", "Berhasil masuk keranjang!");
    }

    public function tambah_keranjang(Request $request)
    {
        $keranjang=new Keranjang;
        $keranjang->user_id=$request->user_id;
        $keranjang->paket_id=$request->paket_id;
        $keranjang->jumlah_paket=$request->jumlah_paket;
        $keranjang->harga=$request->harga;
        $keranjang->save();

        // Redirect user to appropriate page
        return redirect('/keranjang')->with("tambah_keranjang","Keranjang Berhasil ditambah!");
    }

    public function daftar_keranjang()
    {
        return view('admin/keranjang', [
            'title' => 'keranjang',
            'keranjang' => keranjang::all(),
            'user' => User::all(),
            'paket' => Paket::all(),
        ]);
    }

    public function edit_keranjang(Request $request)
    {
        $keranjang = Keranjang::find($request->id);
        $keranjang->user_id = $request->user_id;
        $keranjang->paket_id = $request->paket_id;
        $keranjang->jumlah_paket = $request->jumlah_paket;
        $keranjang->harga = $request->harga;

        if ($keranjang->save()) {
            return redirect('/keranjang')->with("edit_keranjang", "Berhasil Diupdate!");
        } else {
            // Handle the case where the save fails
            return redirect('/keranjang')->with("error", "Gagal Diupdate!");
        }
    }

    public function delete_keranjang($id)
    {
        Keranjang::find($id)->delete();
        return redirect()->back()->with("delete_keranjang","keranjang Berhasil di Hapus");
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
