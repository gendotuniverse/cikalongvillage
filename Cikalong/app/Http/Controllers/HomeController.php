<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kontak;
use App\Models\Produk;
use App\Models\Slider;
use App\Models\Layanan;
use App\Models\Setting;
use App\Models\Tentang;
use App\Models\DataUmum;
use App\Models\SumberDaya;
use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use App\Models\FasilitasDesaModel;
use App\Models\KategoriJudul;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        $profil = Tentang::where('kategori', 'profil')->orderBy('id', 'desc')->limit(6)->get();;
        $slider = Slider::orderBy('id', 'desc')->get();
        $layanan = Tentang::where('kategori', 'pelayanan')->orderBy('id', 'desc')->limit(6)->get();
        $berita = Berita::orderBy('id', 'desc')->limit(6)->get();
        $pemerintahan = Pemerintahan::orderBy('id', 'asc')->get();
        $fasilitas = FasilitasDesaModel::orderBy('id', 'asc')->get();
        $galeri = Galeri::orderBy('id', 'desc')->limit(6)->get();
        $produk = Produk::orderBy('id', 'desc')->limit(6)->get();
        $sumberdaya = SumberDaya::orderBy('id', 'desc')->limit(6)->get();
        $kategoriJudul =  KategoriJudul::orderBy('id', 'DESC')->get();

        return view('home.index', compact('setting', 'profil', 'slider', 'fasilitas', 'layanan', 'berita', 'pemerintahan', 'galeri', 'produk', 'sumberdaya', 'kategoriJudul'));
    }

    // menampilkan halaman tentang
    public function tentang()
    {
        $title = 'Profil';
        $setting = Setting::first();

        $profil = Tentang::where('kategori', 'profil')->orderBy('id', 'desc')->get();
        $pemerintahan = Pemerintahan::orderBy('id', 'asc')->get();

        return view('tentang.index', compact('setting', 'title', 'profil', 'pemerintahan'));
    }


    public function detail_profil($id)
    {
        $title = 'Profil';
        $setting = Setting::first();

        $profil = Tentang::find($id);

        return view('tentang.detail', compact('setting', 'title', 'profil'));
    }


    // menampilkan halaman pelayanan
    public function pelayanan()
    {
        $title = 'Pelayanan';
        $setting = Setting::first();

        $layanan = Tentang::where('kategori', 'pelayanan')->orderBy('id', 'desc')->get();

        return view('pelayanan.index', compact('setting', 'title', 'layanan'));
    }

    // menampilkan halaman detail pelayanan
    public function detail_pelayanan($id)
    {
        $title = 'Pelayanan';
        $setting = Setting::first();

        $layanan = Tentang::find($id);

        return view('pelayanan.detail', compact('setting', 'title', 'layanan'));
    }

    public function fasilitas_desa()
    {
        $title = 'Fasilitas Desa';
        $setting = Setting::first();

        $fasilitas = FasilitasDesaModel::orderBy('id', 'desc')->get();

        return view('fasilitas_desa.index', compact('setting', 'title', 'fasilitas'));
    }

    // menampilkan halaman detail pelayanan
    public function detail_fasilitas_desa($id)
    {
        $title = 'Fasilitas Desa';
        $setting = Setting::first();

        $fasilitas = FasilitasDesaModel::find($id);

        return view('fasilitas_desa.detail', compact('setting', 'title', 'fasilitas'));
    }

    // menampilkan halaman berita
    public function berita()
    {
        $title = 'Berita dan Kegiatan';
        $setting = Setting::first();

        $berita = Berita::orderBy('id', 'desc')->get();

        return view('berita.index', compact('setting', 'title', 'berita'));
    }

    // menampilkan halaman detail berita
    public function detail_berita($id)
    {
        $title = 'Berita dan Kegiatan';
        $setting = Setting::first();

        $berita = Berita::find($id);

        return view('berita.detail', compact('setting', 'title', 'berita'));
    }

    // menampilkan halaman produk
    public function produk()
    {
        $title = 'Produk Unggulan';
        $setting = Setting::first();

        $produk = Produk::orderBy('id', 'desc')->get();

        return view('produk.index', compact('setting', 'title', 'produk'));
    }

    // menampilkan halaman detail produk
    public function detail_produk($id)
    {
        $title = 'Produk Unggulan';
        $setting = Setting::first();

        $produk = Produk::find($id);

        return view('produk.detail', compact('setting', 'title', 'produk'));
    }

    // menampilkan halaman sumberdaya
    public function sumberdaya()
    {
        $title = 'Sumber Daya Alam';
        $setting = Setting::first();

        $sumberdaya = SumberDaya::orderBy('id', 'desc')->get();

        return view('sumberdaya.index', compact('setting', 'title', 'sumberdaya'));
    }

    // menampilkan halaman detail sumberdaya
    public function detail_sumberdaya($id)
    {
        $title = 'Sumber Daya Alam';
        $setting = Setting::first();

        $sumberdaya = SumberDaya::find($id);

        return view('sumberdaya.detail', compact('setting', 'title', 'sumberdaya'));
    }

    // menampilkan halaman kontak
    public function kontak()
    {
        $title = 'Kontak Kami';
        $setting = Setting::first();

        return view('kontak.index', compact('setting', 'title'));
    }

    // Proses kontak
    public function proses_kontak(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'email' => 'required',
                'subjek' => 'required',
                'pesan' => 'required',
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

        $kontak = new Kontak;
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $kontak->subjek = $request->subjek;
        $kontak->pesan = $request->pesan;
        $kontak->save();

        return redirect()->back()->with('berhasil', 'Masukkan berhasil dikirimkan.');
    }
}