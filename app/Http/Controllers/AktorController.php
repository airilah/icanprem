<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AktorController extends Controller
{
    public function akun_admin( )
    {

        $admins = User::where('role', 'admin')->get();
        return view('admin/admin', [
            'title' => 'Akun Admin',
            'admin'=> $admins,
        ]);
    }

    public function akun_cust()
    {
        $customers = User::where('role', 'customer')->get();

        return view('admin.cust', [
            'title' => 'Akun Admin',
            'cust' => $customers,
        ]);
    }
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'email wajib diisi',
                'password.required' => 'password wajib diisi',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // Jika berhasil login, dapatkan role pengguna
            $role = Auth::user()->role;

            // Arahkan pengguna berdasarkan peran (role)
            if ($role == 'admin') {
                return redirect('/admin');
            } elseif ($role == 'customer') {
                return redirect('/');
            } else {
                // Tambahkan logika lain jika ada peran lainnya
                return redirect('/');
            }
        } else {
            return back()->with('loginError', 'Login Gagal, Silahkan Masukkan Username dan Password yang Benar! ');
        }

    }

    public function tambah_user(Request $request)
    {
        $user=new user;
        $user->nama=$request->nama;
        $user->no_wa=$request->no_wa;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->role=$request->role;
        $user->save();

        return redirect('/')->with("tambah_user","Daftar Berhasil, Silahkan Login untuk Melakukan Pemesanan!");
    }


    public function profile_admin()
    {
        return view('admin/profile_admin', [
            'title' => 'Update user',
            'user'=> User::all(),
        ]);

    }
    public function edit_admin(Request $request)
    {
        $user= User::find($request->id);
        $user->nama=$request->nama;
        $user->email=$request->email;
        $user->no_wa=$request->no_wa;
        $user->save();

        return redirect('/profile_admin')->with("edit_akun","Profil Berhasil Diupdate!");
    }

    public function update_user()
    {
        $userId = Auth::id();

        $keranjangCount = Keranjang::where('user_id', $userId)->count();
        return view('profile', [
            'title' => 'Update user',
            'user'=> User::all(),
            'keranjangCount' => $keranjangCount,
        ]);
    }


    public function edit_user(Request $request)
    {
        $user= User::find($request->id);
        $user->nama=$request->nama;
        $user->email=$request->email;
        $user->no_wa=$request->no_wa;
        $user->save();

        return redirect('/profile')->with("edit_akun","Profil Berhasil Diupdate!");
    }

    public function ubah_pw(Request $request, $id)
    {
        $user = User::find($id);

        // Validasi password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }

        // Validasi konfirmasi password baru
        if ($request->password_baru !== $request->konfirmasi_password_baru) {
            return redirect()->back()->with('error', 'Konfirmasi password baru tidak sesuai.');
        }

        // Update password baru
        $user->password = Hash::make($request->password_baru);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }


    // admin

    public function tambah_admin(Request $request)
    {
        $user=new user;
        $user->nama=$request->nama;
        $user->no_wa=$request->no_wa;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->role=$request->role;
        $user->save();

        return redirect('/akun_admin')->with("tambah_cust","Daftar Berhasil!");
    }

    public function delete_akun($id)
    {
        user::find($id)->delete();
        return redirect()->back()->with("delete_akun","Akun Berhasil di Hapus");
    }

    public function edit_akun(Request $request)
    {
        $user= User::find($request->id);
        $user->nama=$request->nama;
        $user->email=$request->email;
        $user->no_wa=$request->no_wa;
        $user->save();

        return redirect('akun_admin')->with("update_admin","Berhasil Diupdate!");
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
