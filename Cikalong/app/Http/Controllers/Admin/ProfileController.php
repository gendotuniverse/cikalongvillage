<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // menampilkan halaman index
    public function index()
    {
        $setting = Setting::first();

        return view('admin.profile.index', compact('setting'));
    }

    // proses edit
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required'
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $user = User::find($id);
        $user->name = $request->nama;
        $user->email = $request->email;
        if ($request->password <> '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->back()->with('berhasil', 'Profil berhasil diubah');
    }
}
