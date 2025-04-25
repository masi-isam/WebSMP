<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function jumlah() {
        $siswaJumlah = Siswa::count();
        $guruJumlah = Guru::count();
        $staffJumlah = Staff::count();

        return view('welcome', compact('siswaJumlah', 'guruJumlah', 'staffJumlah'));
    }
}
