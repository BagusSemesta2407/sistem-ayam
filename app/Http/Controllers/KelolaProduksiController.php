<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
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
        $kandang=Kandang::all();

        return view('produksi.data', [
            'produksi' => $produksi,
            'kandang' => $kandang,
            'request' => $request
        ]);
    }

    public function updateProduksi(Request $request, $produksiId)
    {
        $produksi=Produksi::findOrFail($produksiId);
        $produksi->update($request->all());

        return redirect()->back()->withSuccess('Data berhasil diubah');
    }

    public function produksiId($produksiId)
    {
        $produksi = Produksi::findOrFail($produksiId);

        return response()->json($produksi);
    }

    public function destroyProduksi($produksiId)
    {
        $produksi=Produksi::find($produksiId);

        $produksi->delete();

        return response()->json(['success', 'Data berhasil dihapus']);
    }
}
