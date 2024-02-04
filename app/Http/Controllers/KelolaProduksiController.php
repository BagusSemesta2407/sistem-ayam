<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class KelolaProduksiController extends Controller
{
    public function formTanggal()
    {
        return view('produksi.form-tanggal');
    }

    public function requestTanggal(Request  $request)
    {
        $produksi = Produksi::where('tanggal', $request->tanggal)->get();

        return view('produksi.data', [
            'produksi' => $produksi
        ]);
    }
}
