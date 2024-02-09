<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelolaPemasukanAyamRequest;
use App\Models\Kandang;
use App\Models\PemasukanAyam;
use Illuminate\Http\Request;

class KelolaPemasukanAyamController extends Controller
{
    public function formTanggal()
    {
        return view('pemasukan-ayam.form-tanggal');
    }

    public function requestTanggal(KelolaPemasukanAyamRequest $request)
    {
        $pemasukanAyam = PemasukanAyam::where('tanggal_masuk', $request->tanggal_masuk)->get();
        $kandang=Kandang::all();


        return view('pemasukan-ayam.data', [
            'pemasukanAyam' => $pemasukanAyam,
            'kandang' => $kandang,
            'request' => $request
        ]);
    }

    public function pemasukanAyamId($pemasukanAyamId)
    {
        $pemasukanAyam = PemasukanAyam::findOrFail($pemasukanAyamId);

        return response()->json($pemasukanAyam);
    }

    public function updatePemasukanAyam(Request $request, $pemasukanAyamId)
    {
        $pemasukanAyam = PemasukanAyam::findOrFail($pemasukanAyamId);

        $pemasukanAyam->update($request->all());

        return redirect()->back()->withSuccess('Data berhasil diubah');
    }

    public function destroyPemasukanAyam($pemasukanAyamId)
    {
        $pemasukanAyam = PemasukanAyam::find($pemasukanAyamId);
        $pemasukanAyam->delete();

        return response()->json(['success', 'Data berhasil diubah']);
    }
}
