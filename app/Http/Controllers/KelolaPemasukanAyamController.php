<?php

namespace App\Http\Controllers;

use App\Models\PemasukanAyam;
use Illuminate\Http\Request;

class KelolaPemasukanAyamController extends Controller
{
    public function formTanggal()
    {
        return view('pemasukan-ayam.form-tanggal');
    }

    public function requestTanggal(Request $request)
    {
        $pemasukanAyam = PemasukanAyam::where('tanggal_masuk', $request->tanggal_masuk)->get();

        return view('pemasukan-ayam.data', [
            'pemasukanAyam' => $pemasukanAyam
        ]);
    }
}
