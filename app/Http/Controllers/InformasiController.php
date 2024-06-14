<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function info_pendaftaran()
    {
        return view('pendaftaran', [
            'title' => 'Informasi Pendaftaran',
        ]);
    }
    public function informasi_beli()
    {
        return view('info_beli', [
            'title' => 'Informasi pembayaran',
        ]);
    }

    //untuk yang sudah login
    public function info_beli()
    {
        $userId = Auth::id();
        $keranjangCount = Keranjang::where('user_id', $userId)->count();
        return view('info_beli', [
            'title' => 'Informasi Reservasi',
            'keranjangCount' => $keranjangCount,
        ]);
    }

    public function pendaftaran()
    {
        return view('pendaftaran', [
            'title' => 'Informasi Pendaftaran',
        ]);
    }
}
