<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // menampilkan halaman index
    public function index()
    {
        $setting = Setting::first();
        
        return view('admin.dashboard.index', compact('setting'));
    }
}
