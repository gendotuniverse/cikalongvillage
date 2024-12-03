<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Layanan;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        return view('admin.layanan.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Layanan::orderBy('id', 'desc');
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
                $btn = '<a href="'.route('admin.layanan.edit', $row->id).'" class="btn btn-primary btn-sm me-3 mb-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="'.route('admin.layanan.delete', $row->id).'" class="btn btn-danger btn-sm mb-2" title="Hapus">
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

        return view('admin.layanan.add', compact('setting'));
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

        $layanan = new Layanan;
        $layanan->judul = $request->judul;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->gambar = $gambarName;
        $layanan->save();

        return redirect()->route('admin.layanan')->with('berhasil', 'Layanan berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $layanan = Layanan::find($id);

        return view('admin.layanan.edit', compact('setting', 'layanan'));
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

        $layanan = Layanan::find($id);
        $layanan->judul = $request->judul;
        $layanan->deskripsi = $request->deskripsi;
        if ($request->gambar <> '') {
            $layanan->gambar = $gambarName;
        }
        $layanan->save();

        return redirect()->route('admin.layanan')->with('berhasil', 'Layanan berhasil diupdate');
    }

    // Proses Hapus
    public function destroy($id)
    {
        $layanan = Layanan::find($id);
        $layanan->delete();

        return redirect()->back()->with('berhasil', 'Layanan berhasil dihapus');
    }
}
