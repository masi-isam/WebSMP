<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    function tampilAdminRegister() {
        return view('adminRegister');
    }

    function tambahAdmin(Request $request) {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('tampil.adminLogin');
    }

    function tampilAdminLogin() {
        return view('adminLogin');
    }

    function loginAdmin(Request $request) {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }else {
            return redirect()->back()->with('error', 'Email atau Password anda salah');
        }

    }
}
