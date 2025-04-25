<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class MuridController extends Controller
{
   
    function tampil() {
        $siswa = Siswa::get();
        return view('siswa.tampil', compact('siswa'));
    }

    function tambah(Request $request) {
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->nama_ortu = $request->nama_ortu;
        $siswa->status = $request->status;
        $siswa->save();

        return redirect()->route('siswa.tampil');
    }

    function edit(Request $request, $id){
        $siswa = Siswa::find($id);
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->nama_ortu = $request->nama_ortu;
        $siswa->status = $request->status;
        $siswa->update();

        return redirect()->route('siswa.tampil');
    }

    function hapus($id) {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa.tampil');
    }
}
