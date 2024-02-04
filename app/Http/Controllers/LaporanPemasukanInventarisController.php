<?php

namespace App\Http\Controllers;

use App\Models\PemasukanInventaris;
use Illuminate\Http\Request;

class LaporanPemasukanInventarisController extends Controller
{
    public function index()
    {
        $pemasukanInventaris = PemasukanInventaris::all();

        return view('pemasukan-inventaris.report',[
            'pemasukanInventaris' => $pemasukanInventaris
        ]);
    }
}
