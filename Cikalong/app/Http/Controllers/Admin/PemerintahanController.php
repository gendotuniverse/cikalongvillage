<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PemerintahanController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        return view('admin.pemerintahan.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Pemerintahan::orderBy('id', 'desc');
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('gambar', function($row) {
                return '<img src="'.url($row->gambar).'" width="50">';
            })
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route('admin.pemerintahan.edit', $row->id).'" class="btn btn-primary btn-sm me-3 mb-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="'.route('admin.pemerintahan.delete', $row->id).'" class="btn btn-danger btn-sm mb-2" title="Hapus">
                        <i class="fas fa-trash"></i> Hapus
                    </a>';

                return $btn;
            })
            ->rawColumns(['action', 'gambar'])
            ->make(true);

        return $datatables;
    }

    // menampilkan halaman tambah
    public function create()
    {
        $setting = Setting::first();

        return view('admin.pemerintahan.add', compact('setting'));
    }

    // proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
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

        $pemerintahan = new Pemerintahan;
        $pemerintahan->nama = $request->nama;
        $pemerintahan->jabatan = $request->jabatan;
        $pemerintahan->gambar = $gambarName;
        $pemerintahan->save();

        return redirect()->route('admin.pemerintahan')->with('berhasil', 'Pemerintahan berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $pemerintahan = Pemerintahan::find($id);

        return view('admin.pemerintahan.edit', compact('setting', 'pemerintahan'));
    }

    // proses edit
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
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

        $pemerintahan = Pemerintahan::find($id);
        $pemerintahan->nama = $request->nama;
        $pemerintahan->jabatan = $request->jabatan;
        if ($request->gambar <> '') {
            $pemerintahan->gambar = $gambarName;
        }
        $pemerintahan->save();

        return redirect()->route('admin.pemerintahan')->with('berhasil', 'Pemerintahan berhasil diupdate');
    }

    // Proses Hapus
    public function destroy($id)
    {
        $pemerintahan = Pemerintahan::find($id);
        $pemerintahan->delete();

        return redirect()->back()->with('berhasil', 'Pemerintahan berhasil dihapus');
    }
}
