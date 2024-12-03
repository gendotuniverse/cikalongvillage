<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriJudul;
use App\Models\SubKategoriJudul;

class SubKategoriJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['setting'] = Setting::first();
        $data['result'] =  SubKategoriJudul::with('kategoriJudul')->orderBy('id', 'DESC')->get();
        return view("admin.sub-kategori-judul.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['kategoriJudul'] = KategoriJudul::all();
        $data['setting'] = Setting::first();
        return view("admin.sub-kategori-judul.create", $data);
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
        SubKategoriJudul::create([
            'name' => $request->name,
            'kategori_judul_id' => $request->kategori_judul_id,
        ]);
        return redirect('admin/sub-kategori-judul')->with('success', 'Data berhasil disimpan!');
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
        $data['title'] = "Edit Sub Kategori Judul";
        $data['setting'] = Setting::first();
        $data['kategoriJudul'] = KategoriJudul::all();
        $data['result'] = SubKategoriJudul::findOrFail($id);
        return view("admin.sub-kategori-judul.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = SubKategoriJudul::find($id);
        $post->kategori_judul_id = $request->kategori_judul_id;
        $post->name = $request->name;
        // $post->slug = $request->slug;
        $post->save();

        return redirect('admin/sub-kategori-judul')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kategori = SubKategoriJudul::findOrFail($id);
        $kategori->delete();
        return back()->with('danger', 'Data sudah di Hapus!');
    }
}
