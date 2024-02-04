<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function create()
    {
        $kandang = Kandang::all();
        return view('produksi.create', [
            'kandang' => $kandang
        ]);
    }

    public function store(Request $request)
    {
        if ($request['status_busuk']) {
            Produksi::create([
                'kandang_id' => $request->kandang_id,
                'tanggal' => $request->tanggal,
                'kuantitas' => $request->status_busuk,
                'status' => 'Busuk'
            ]);
        }
        if ($request['status_pecah']) {
            Produksi::create([
                'kandang_id' => $request->kandang_id,
                'tanggal' => $request->tanggal,
                'kuantitas' => $request->status_pecah,
                'status' => 'Pecah'
            ]);
        }
        if ($request['status_terjual']) {
            Produksi::create([
                'kandang_id' => $request->kandang_id,
                'tanggal' => $request->tanggal,
                'kuantitas' => $request->status_terjual,
                'status' => 'Terjual'
            ]);
        }
        if ($request['status_jumbo']) {
            Produksi::create([
                'kandang_id' => $request->kandang_id,
                'tanggal' => $request->tanggal,
                'kuantitas' => $request->status_terjual,
                'status' => 'Jumbo'
            ]);
        }

        return redirect()->back();
        
    }
}
