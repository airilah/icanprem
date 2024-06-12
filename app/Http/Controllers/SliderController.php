<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function daftar_slider()
    {
        return view('admin/slider', [
            'title' => 'slider',
            'slider' => Slider::all(),
        ]);
    }

    public function tambah_slider(Request $request)
    {
        $slider=new Slider;
        $slider->nama_slider=$request->nama_slider;

        if ($request->hasFile('gambar_slider')) {
            $fileName2 = $request->file('gambar_slider')->getClientOriginalName();
            $request->file('gambar_slider')->move('assets/img/', $fileName2);
            $slider->gambar_slider = $fileName2;
        }

        if ($slider->save()) {
            return redirect('/daftar_slider')->with('tambah_slider', 'Slider Berhasil Ditambah!');
        } else {
            return redirect('/daftar_slider')->with('error', 'Slider Gagal Ditambah!');
        }
    }

    public function edit_slider(Request $request, $id)
    {
        $slider = slider::findOrFail($id);

        // Update slider
        $slider->nama_slider = $request->input('nama_slider');

        // Handle gambar_slider upload
        if ($request->hasFile('gambar_slider')) {
            $file = $request->file('gambar_slider');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/img/', $filename);
            $slider->gambar_slider = $filename;
        }

        $slider->save();

        return redirect('/daftar_slider')->with('edit_slider', 'Slider berhasil diupdate!');
    }

    public function delete_slider($id)
    {
        Slider::find($id)->delete();
        return redirect()->back()->with("delete_slider","Slider Berhasil di Hapus");
    }
}
