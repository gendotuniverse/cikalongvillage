<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Setting;
use App\Models\Tentang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TentangController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        $tentang = Tentang::first();

        return view('admin.tentang.index', compact('setting', 'tentang'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Tentang::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('deskripsi', function ($row) {
                if (strlen($row->deskripsi) > 100) {
                    return substr($row->deskripsi, 0, 150) . '...';
                } else {
                    return $row->deskripsi;
                }
            })
            ->addColumn('kategori', function ($row) {
                if ($row->kategori == 'profil') {
                    return '<span class="badge badge-primary">Profil</span>';
                } else {
                    return '<span class="badge badge-success">Pelayanan</span>';
                }
            })
            ->addColumn('gambar', function ($row) {
                return '<img src="' . url($row->gambar) . '" width="50">';
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('admin.tentang.edit', $row->id) . '" class="btn btn-primary btn-sm me-3 mb-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="' . route('admin.tentang.delete', $row->id) . '" class="btn btn-danger btn-sm mb-2" title="Hapus">
                            <i class="fas fa-trash"></i> Hapus
                        </a>';

                return $btn;
            })
            ->rawColumns(['action', 'kategori', 'deskripsi', 'gambar'])
            ->make(true);

        return $datatables;
    }

    // menampilkan halaman tambah
    public function create()
    {
        $setting = Setting::first();

        return view('admin.tentang.add', compact('setting'));
    }

    // proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'kategori' => 'required',
                'gambar' => 'required|mimes:png,jpg,jpeg,svg,webp',
            ],
            [
                'required' => ':attribute wajib diisi!!',
                'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $gambar = $request->file('gambar');
        $namagambar = 'Gambar-' . Carbon::now()->format('Ymd') . Str::random(5) . '.' . $gambar->extension();
        $gambar->move(public_path('images/'), $namagambar);
        $gambarName = 'images/' . $namagambar;

        $tentang = new Tentang;
        $tentang->judul = $request->judul;
        $tentang->deskripsi = $request->deskripsi;
        $tentang->kategori = $request->kategori;
        $tentang->gambar = $gambarName;
        $tentang->save();

        return redirect()->route('admin.tentang')->with('berhasil', 'Profil berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $tentang = Tentang::find($id);

        return view('admin.tentang.edit', compact('setting', 'tentang'));
    }

    // proses edit
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'kategori' => 'required',
                'gambar' => 'mimes:png,jpg,jpeg,svg,webp',
            ],
            [
                'required' => ':attribute wajib diisi!!',
                'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        if ($request->gambar <> '') {
            $gambar = $request->file('gambar');
            $namagambar = 'Gambar-' . Carbon::now()->format('Ymd') . Str::random(5) . '.' . $gambar->extension();
            $gambar->move(public_path('images/'), $namagambar);
            $gambarName = 'images/' . $namagambar;
        }

        $tentang = Tentang::find($id);
        $tentang->judul = $request->judul;
        $tentang->deskripsi = $request->deskripsi;
        $tentang->kategori = $request->kategori;
        if ($request->gambar <> '') {
            $tentang->gambar = $gambarName;
        }
        $tentang->save();

        return redirect()->route('admin.tentang')->with('berhasil', 'Profil berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Tentang::find($id);
        $produk->delete();

        return redirect()->back()->with('berhasil', 'Profil berhasil dihapus');
    }
}
