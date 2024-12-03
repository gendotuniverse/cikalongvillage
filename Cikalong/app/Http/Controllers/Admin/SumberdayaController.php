<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\SumberDaya;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SumberdayaController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        return view('admin.sumberdaya.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = SumberDaya::orderBy('id', 'desc');
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
                $btn = '<a href="'.route('admin.sumberdaya.edit', $row->id).'" class="btn btn-primary btn-sm me-3 mb-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                    
                $btn .= '<a href="'.route('admin.sumberdaya.delete', $row->id).'" class="btn btn-danger btn-sm mb-2" title="Hapus">
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

        return view('admin.sumberdaya.add', compact('setting'));
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

        $sumberdaya = new SumberDaya;
        $sumberdaya->judul = $request->judul;
        $sumberdaya->deskripsi = $request->deskripsi;
        $sumberdaya->gambar = $gambarName;
        $sumberdaya->save();

        return redirect()->route('admin.sumberdaya')->with('berhasil', 'Sumber Daya berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $sumberdaya = SumberDaya::find($id);

        return view('admin.sumberdaya.edit', compact('setting', 'sumberdaya'));
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

        $sumberdaya = SumberDaya::find($id);
        $sumberdaya->judul = $request->judul;
        $sumberdaya->deskripsi = $request->deskripsi;
        if ($request->gambar <> '') {
            $sumberdaya->gambar = $gambarName;
        }
        $sumberdaya->save();

        return redirect()->route('admin.sumberdaya')->with('berhasil', 'Sumber Daya berhasil diupdate');
    }

    // Proses Hapus
    public function destroy($id)
    {
        $sumberdaya = SumberDaya::find($id);
        $sumberdaya->delete();

        return redirect()->back()->with('berhasil', 'Sumber Daya berhasil dihapus');
    }
}
