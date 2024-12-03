<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Tentang;
use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use App\Models\KategoriJudul;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\DataUmum as ModelsDataUmum;

class DataUmum extends Controller
{
    //
    public function index()
    {
        $data['title'] = 'Data Umum';
        $data['pemerintahan'] = Pemerintahan::orderBy('id', 'asc')->get();
        $data['profil'] = Tentang::where('kategori', 'profil')->orderBy('id', 'desc')->get();
        $data['setting'] = Setting::first();

        $data['kategoriJudul']  = KategoriJudul::orderBy('id', 'desc')->get();

        return view('data-umum.index', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Data Umum';
        $data['pemerintahan'] = Pemerintahan::orderBy('id', 'asc')->get();
        $data['profil'] = Tentang::where('kategori', 'profil')->orderBy('id', 'desc')->get();
        $data['setting'] = Setting::first();

        // Ambil data berdasarkan kategori
        $data['judul'] = ModelsDataUmum::with('kategoriJudul', 'subKategoriJudul')->where('kategori_judul_id', $id)->first();
        $data['dataUmum'] = ModelsDataUmum::with('kategoriJudul', 'subKategoriJudul')->where('kategori_judul_id', $id)->get();
        $sheetData = [];  // Menyimpan data Excel

        foreach ($data['dataUmum'] as $item) {
            if ($item->file_excel) {
                $filePath = storage_path('app/public/' . $item->file_excel);

                // Memastikan file ada sebelum dibaca
                if (file_exists($filePath)) {
                    try {
                        $spreadsheet = IOFactory::load($filePath);
                        $sheetData[] = $spreadsheet->getActiveSheet()->toArray(); // Menambahkan setiap file ke array
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'Gagal membaca file Excel: ' . $e->getMessage());
                    }
                } else {
                    return redirect()->back()->with('error', 'File tidak ditemukan: ' . $filePath);
                }
            }
        }

        // Kirim data ke view
        return view('data-umum.detail', $data, compact('data', 'sheetData'));
    }
}
