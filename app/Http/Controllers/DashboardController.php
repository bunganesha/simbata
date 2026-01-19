<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home.dashboard', [
            'totalMahasiswa' => Mahasiswa::count(),
            'totalDosen'     => Dosen::count(),
        ]);
    }
}
