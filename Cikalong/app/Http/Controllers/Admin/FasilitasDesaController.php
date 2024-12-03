<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FasilitasDesaModel;
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FasilitasDesaController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        $fasilitas = FasilitasDesaModel::first();

        return view('admin.fasilitas_desa.index', compact('setting', 'fasilitas'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = FasilitasDesaModel::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('deskripsi', function ($row) {
                if (strlen($row->deskripsi) > 100) {
                    return substr($row->deskripsi, 0, 150) . '...';
                } else {
                    return $row->deskripsi;
                }
            })
            ->addColumn('gambar', function ($row) {
                return '<img src="' . url($row->gambar) . '" width="50">';
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('admin.fasilitas_desa.edit', $row->id) . '" class="btn btn-primary btn-sm me-3 mb-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="' . route('admin.fasilitas_desa.delete', $row->id) . '" class="btn btn-danger btn-sm mb-2" title="Hapus">
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

        return view('admin.fasilitas_desa.add', compact('setting'));
    }

    // proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'deskripsi' => 'required',
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

        $fasilitas = new FasilitasDesaModel();
        $fasilitas->judul = $request->judul;
        $fasilitas->deskripsi = $request->deskripsi;
        $fasilitas->gambar = $gambarName;
        $fasilitas->save();

        return redirect()->route('admin.fasilitas_desa')->with('berhasil', 'Fasilitas Desa berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $fasilitas = FasilitasDesaModel::find($id);

        return view('admin.fasilitas_desa.edit', compact('setting', 'fasilitas'));
    }

    // proses edit
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'deskripsi' => 'required',
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

        $fasilitas = FasilitasDesaModel::find($id);
        $fasilitas->judul = $request->judul;
        $fasilitas->deskripsi = $request->deskripsi;
        if ($request->gambar <> '') {
            $fasilitas->gambar = $gambarName;
        }
        $fasilitas->save();

        return redirect()->route('admin.fasilitas_desa')->with('berhasil', 'Fasilitas Desa berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = FasilitasDesaModel::find($id);
        $produk->delete();

        return redirect()->back()->with('berhasil', 'Fasilitas Desa berhasil dihapus');
    }
}
