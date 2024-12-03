<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\DataUmum;
use Illuminate\Http\Request;
use App\Models\KategoriJudul;
use App\Http\Controllers\Controller;
use App\Models\SubKategoriJudul;

class DataUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['title'] = 'Data Umum';
        $data['setting'] = Setting::first();
        $data['result'] =  DataUmum::with('kategoriJudul')->orderBy('id', 'DESC')->get();
        return view("admin.data-umum.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getSubKategoriByKategori(Request $request)
    {
        $subKategoriJudul = SubKategoriJudul::where('kategori_judul_id', $request->kategori_judul_id)->get();
        return response()->json($subKategoriJudul);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Umum';
        $data['setting'] = Setting::first();
        $data['kategoriJudul'] = KategoriJudul::all();
        return view("admin.data-umum.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kategori_judul_id' => 'required|exists:kategori_juduls,id',
            'file_excel.*' => 'required|file|mimes:xlsx,xls',
        ]);

        foreach ($request->sub_kategori_judul_id as $key => $subKategoriId) {
            $file = $request->file('file_excel')[$key];
            $filePath = $file->store('uploads/excel_files', 'public');

            DataUmum::create([
                'kategori_judul_id' => $request->kategori_judul_id,
                'sub_kategori_judul_id' => $subKategoriId,
                'file_excel' => $filePath,
            ]);
        }

        return redirect('admin/data-umum')->with('success', 'Data berhasil ditambahkan!');
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
        $data['title'] = "Edit Data Umum";
        $data['setting'] = Setting::first();
        $data['kategoriJudul'] = KategoriJudul::all();
        $data['subkategoriJudul'] = SubKategoriJudul::all();
        $data['result'] = DataUmum::findOrFail($id);
        return view("admin.data-umum.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = DataUmum::find($id);
        $post->sub_kategori_judul_id = $request->sub_kategori_judul_id;
        $post->kategori_judul_id = $request->kategori_judul_id;
        $post->file_excel = $request->file_excel;
        // $post->slug = $request->slug;
        $post->save();

        return redirect('admin/data-umum')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $damum = DataUmum::findOrFail($id);
        $damum->delete();
        return back()->with('danger', 'Data sudah di Hapus!');
    }
}
