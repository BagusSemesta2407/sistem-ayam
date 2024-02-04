<?php

namespace App\Http\Controllers;

use App\Models\PemasukanAyam;
use Illuminate\Http\Request;

class LaporanPemasukanAyamController extends Controller
{
    public function index()
    {
        $pemasukanAyam = PemasukanAyam::all();

        return view('pemasukan-ayam.report', [
            'pemasukanAyam' => $pemasukanAyam
        ]);
    }
}
