<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        return view('admin.slider.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Slider::orderBy('id', 'desc');
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('gambar', function($row) {
                return '<img src="'.url($row->gambar).'" width="50">';
            })
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route('admin.slider.edit', $row->id).'" class="btn btn-primary btn-sm me-3 mb-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="'.route('admin.slider.delete', $row->id).'" class="btn btn-danger btn-sm mb-2" title="Hapus">
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

        return view('admin.slider.add', compact('setting'));
    }

    // proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        $slider = new Slider;
        $slider->gambar = $gambarName;
        $slider->save();

        return redirect()->route('admin.slider')->with('berhasil', 'Slider berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $slider = Slider::find($id);

        return view('admin.slider.edit', compact('setting', 'slider'));
    }

    // proses edit
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
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

        $slider = Slider::find($id);
        if ($request->gambar <> '') {
            $slider->gambar = $gambarName;
        }
        $slider->save();

        return redirect()->route('admin.slider')->with('berhasil', 'Slider berhasil diupdate');
    }

    // Proses Hapus
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return redirect()->back()->with('berhasil', 'Slider berhasil dihapus');
    }
}
