<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function tampil() {
        $staff = Staff::get();
        return view('staff.tampil', compact('staff'));
    }

    function tambah(Request $request) {
        $staff = new Staff();
        $staff->nip = $request->nip;
        $staff->nama_staff = $request->nama_staff;
        $staff->jenis_kelamin = $request->jenis_kelamin;
        $staff->tempat_lahir = $request->tempat_lahir;
        $staff->tanggal_lahir = $request->tanggal_lahir;
        $staff->alamat = $request->alamat;
        $staff->no_telepon = $request->no_telepon;
        $staff->jabatan = $request->jabatan;
        $staff->status = $request->status;
        $staff->save();

        return redirect()->route('staff.tampil');
    }

    function edit(Request $request, $id) {
        $staff = Staff::find($id);
        $staff->nip = $request->nip;
        $staff->nama_staff = $request->nama_staff;
        $staff->jenis_kelamin = $request->jenis_kelamin;
        $staff->tempat_lahir = $request->tempat_lahir;
        $staff->tanggal_lahir = $request->tanggal_lahir;
        $staff->alamat = $request->alamat;
        $staff->no_telepon = $request->no_telepon;
        $staff->jabatan = $request->jabatan;
        $staff->status = $request->status;
        $staff->update();

        return redirect()->route('staff.tampil');
    }

    function hapus($id) {
        $staff = Staff::find($id);
        $staff->delete();

        return redirect()->route('staff.tampil');
    }
}
