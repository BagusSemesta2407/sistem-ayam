<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class LaporanProduksiController extends Controller
{
    public function index()
    {
        $produksi = Produksi::all();

        return view('produksi.report', [
            'produksi' => $produksi
        ]);
    }
}
