<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiSiswa;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $informasi_siswa = InformasiSiswa::where('user_id',  Auth::user()->id)->first();

        return view('dashboard-siswa', compact('informasi_siswa'));
    }
}
