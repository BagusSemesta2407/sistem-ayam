<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use App\Models\PemasukanAyam;
use Illuminate\Http\Request;

class PemasukanAyamController extends Controller
{
    public function create()
    {
        $kandang = Kandang::all();

        return view('pemasukan-ayam.create', [
            'kandang' => $kandang
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $pemasukanAyamList = []; 

        for ($i = 0; $i < $requestData['jumlah_ayam']; $i++) {
            $pemasukanAyam = new PemasukanAyam;

            $pemasukanAyam->kandang_id = $requestData['kandang_id'];
            $pemasukanAyam->tanggal_masuk = $requestData['tanggal_masuk'];

            $pemasukanAyam->save();

            $pemasukanAyamList[] = $pemasukanAyam; 
        }

        foreach ($pemasukanAyamList as $item) {
            $item->update([
                'kode_ayam' => 'AM-' . sprintf("%04d", $item->id)
            ]);
        }

        return redirect()->back();
    }
}
