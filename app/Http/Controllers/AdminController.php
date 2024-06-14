<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $income = DB::table('pemesanans')->where('status',['Terkirim'])->sum('total_harga');
        $digunakan = DB::table('pemesanans')->where('status',['Terkirim'])->count();
        $antri = DB::table('pemesanans')->where('status',['Proses'])->count();
        $customer = DB::table('users')->where('role', ['customer'])->count();
        $admin = DB::table('users')->where('role', ['admin'])->count();
        $antrian = Pemesanan::limit(10)->whereIn('status', ['Belum terverifikasi', 'Menunggu Konfirmasi'])->get();
        $paket = Paket::all();
        $pesan = Pemesanan::where('status', 'Proses')->get();
        $jual = Pemesanan::where('status', 'Terkirim')->get();
        $users = User::limit(5)->orderBy('created_at', 'desc')->where('role', 'customer')->get();


        return view('admin/dashboard',compact('income','digunakan','customer','admin','antrian','antri','paket','users','pesan','jual'));
    }
}
