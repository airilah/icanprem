<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Produk;
use App\Models\Slider;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesan = DB::table('pemesanans')->where('status', 'Terkirim')->count();
        $customer = DB::table('users')->where('role', 'customer')->count();

        $userId = Auth::id();

        $keranjangCount = Keranjang::where('user_id', $userId)->count();

        return view('index', [
            'title' => 'Home',
            'produk' => Produk::all(),
            'slider' => Slider::all(),
            "paket" => Paket::all(),
            'keranjangCount' => $keranjangCount,
            'pesan' => $pesan,
            'customer' => $customer,
        ]);
    }


    public function daftar_produk()
    {
        return view('admin/produk', [
            'title' => 'produk',
            'produk' => Produk::all(),
        ]);
    }

    public function hal_utama()
    {
        return view('home', [
            'title' => 'home',
            'produk' => produk::all()
        ]);
    }

    public function tambah_produk(Request $request)
    {
        // Validasi request terlebih dahulu
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Buat produk baru tanpa gambar terlebih dahulu
        $paket = new Produk($request->except(['_token', 'submit', 'gambar1', 'gambar2']));

        // Cek dan simpan gambar1
        if ($request->hasFile('gambar1')) {
            $fileName1 = $request->file('gambar1')->getClientOriginalName();
            $request->file('gambar1')->move('assets/img/', $fileName1);
            $paket->gambar1 = $fileName1;
        }

        // Cek dan simpan gambar2
        if ($request->hasFile('gambar2')) {
            $fileName2 = $request->file('gambar2')->getClientOriginalName();
            $request->file('gambar2')->move('assets/img/', $fileName2);
            $paket->gambar2 = $fileName2;
        }

        // Simpan produk ke database
        if ($paket->save()) {
            return redirect('/produk')->with('tambah_produk', 'Produk Berhasil Ditambah!');
        } else {
            return redirect('/produk')->with('error', 'Produk Gagal Ditambah!');
        }
    }

    public function delete_produk($id)
    {
        produk::find($id)->delete();
        return redirect()->back()->with("delete_produk","produk Berhasil di Hapus");
    }


    public function update_produk($id)
    {
        return view('admin/update/update_produk', [
            'title' => 'Update produk',
            'produk'=> Produk::find($id),
        ]);
    }


    public function edit_produk(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        // Update produk
        $produk->nama_produk = $request->input('nama_produk');
        $produk->deskripsi = $request->input('deskripsi');

        // Handle gambar1 upload
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/img/', $filename);
            $produk->gambar1 = $filename;
        }

        // Handle gambar2 upload
        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/img/', $filename);
            $produk->gambar2 = $filename;
        }

        $produk->save();

        return redirect('/produk')->with('edit_produk', 'Produk berhasil diupdate!');
    }
}
