<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriJudul;

class KategoriJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['setting'] = Setting::first();
        $data['result'] =  KategoriJudul::orderBy('id', 'DESC')->get();
        return view("admin.kategori-judul.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['setting'] = Setting::first();
        return view("admin.kategori-judul.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'name Kosong !',
            ],
        );
        KategoriJudul::create([
            'name' => $request->name,
        ]);
        return redirect('admin/kategori-judul')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data['setting'] = Setting::first();
        $data['title'] = "Edit Kategori Judul";
        $data['result'] = KategoriJudul::findOrFail($id);
        return view("admin.kategori-judul.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = KategoriJudul::find($id);
        $post->name = $request->name;
        // $post->slug = $request->slug;
        $post->save();

        return redirect('admin/kategori-judul')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kategori = KategoriJudul::findOrFail($id);
        $kategori->delete();
        return back()->with('danger', 'Data sudah di Hapus!');
    }
}
