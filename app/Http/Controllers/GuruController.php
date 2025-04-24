<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    function tampil() {
        $guru = Guru::get();
        return view('guru.tampil', compact('guru'));
    }

    function tambah(Request $request) {
        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->alamat = $request->alamat;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->status = $request->status;
        $guru->save();

        return redirect()->route('guru.tampil');
    }

    function edit(Request $request, $id) {
        $guru = Guru::find($id);
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->alamat = $request->alamat;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->status = $request->status;
        $guru->update();

        return redirect()->route('guru.tampil');
    }

    function hapus($id) {
        $guru = Guru::find($id);
        $guru->delete();

        return redirect()->route('guru.tampil');
    }

}
