<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // menampilkan halaman login
    public function login()
    {
        $setting = Setting::first();

        return view('admin.auth.login', compact('setting'));
    }

    // proses login
    public function proses_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'min' => ':attribute minimal harus :min karakter'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $email = $request->email;
        $password = Hash::make($request->password);
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $email)->first();
            Auth::guard($user->role)->loginUsingId($user->id);
            return redirect()->route(Auth::user()->role.'.dashboard')->with('berhasil', 'Selamat datang '.Auth::user()->name);
        } else {
            return back()->with('gagal', 'Data yang dimasukkan tidak sesuai.');
        }
    }

    // Proses logout
    public function logout($slug)
    {
        Auth::guard($slug)->logout();

        return redirect()->route('login')->with('berhasil', 'Berhasil keluar akun.');
    }
}
