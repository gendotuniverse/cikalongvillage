<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KontakController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        return view('admin.kontak.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Kontak::orderBy('id', 'desc');
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route('admin.kontak.delete', $row->id).'" class="btn btn-danger btn-sm mb-2" title="Hapus">
                        <i class="fas fa-trash"></i> Hapus
                    </a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $datatables;
    }

    // Proses Hapus
    public function destroy($id)
    {
        $kontak = Kontak::find($id);
        $kontak->delete();

        return redirect()->back()->with('berhasil', 'Kontak berhasil dihapus');
    }
}
