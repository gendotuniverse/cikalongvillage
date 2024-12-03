<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        return view('admin.berita.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Berita::orderBy('id', 'desc');
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('deskripsi', function($row) {
                if (strlen($row->deskripsi) > 100) {
                    return substr($row->deskripsi, 0, 150).'...';
                } else {
                    return $row->deskripsi;
                }
            })
            ->addColumn('gambar', function($row) {
                return '<img src="'.url($row->gambar).'" width="50">';
            })
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route('admin.berita.edit', $row->id).'" class="btn btn-primary btn-sm me-3 mb-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="'.route('admin.berita.delete', $row->id).'" class="btn btn-danger btn-sm mb-2" title="Hapus">
                        <i class="fas fa-trash"></i> Hapus
                    </a>';

                return $btn;
            })
            ->rawColumns(['action', 'deskripsi', 'gambar'])
            ->make(true);

        return $datatables;
    }

    // menampilkan halaman tambah
    public function create()
    {
        $setting = Setting::first();

        return view('admin.berita.add', compact('setting'));
    }

    // proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg,svg,webp',
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $gambar = $request->file('gambar');
        $namagambar = 'Gambar-'.Carbon::now()->format('Ymd').Str::random(5).'.'.$gambar->extension();
        $gambar->move(public_path('images/'), $namagambar);
        $gambarName = 'images/'.$namagambar;

        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->gambar = $gambarName;
        $berita->save();

        return redirect()->route('admin.berita')->with('berhasil', 'Berita berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $berita = Berita::find($id);

        return view('admin.berita.edit', compact('setting', 'berita'));
    }

    // proses edit
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg,svg,webp',
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        if ($request->gambar <> '') {
            $gambar = $request->file('gambar');
            $namagambar = 'Gambar-'.Carbon::now()->format('Ymd').Str::random(5).'.'.$gambar->extension();
            $gambar->move(public_path('images/'), $namagambar);
            $gambarName = 'images/'.$namagambar;
        }

        $berita = Berita::find($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        if ($request->gambar <> '') {
            $berita->gambar = $gambarName;
        }
        $berita->save();

        return redirect()->route('admin.berita')->with('berhasil', 'Berita berhasil diupdate');
    }

    // Proses Hapus
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();

        return redirect()->back()->with('berhasil', 'Berita berhasil dihapus');
    }
}
