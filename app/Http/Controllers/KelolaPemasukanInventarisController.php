<?php

namespace App\Http\Controllers;

use App\Http\Requests\TanggalPemasukanInventarisRequest;
use App\Models\Inventaris;
use App\Models\PemasukanInventaris;
use Illuminate\Http\Request;

class KelolaPemasukanInventarisController extends Controller
{
    public function timeIndex()
    {
        return view('pemasukan-inventaris.index');
    }

    public function requestTimeIndex(TanggalPemasukanInventarisRequest $request)
    {
        $pemasukanInventaris = PemasukanInventaris::where('waktu', $request->waktu)->get();
        $inventaris = Inventaris::all();
        return view('pemasukan-inventaris.data', [
            'pemasukanInventaris' => $pemasukanInventaris,
            'inventaris' => $inventaris,
            'request' => $request
        ]);
    }

    public function pemasukanInventarisId($pemasukanInventarisId)
    {
        $pemasukanInventaris = PemasukanInventaris::findOrFail($pemasukanInventarisId);
        return response()->json($pemasukanInventaris);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'inventaris_id' => $request->inventaris_id,
            'waktu' => $request->waktu,
            'kuantitas' => $request->kuantitas,
            'satuan' => $request->satuan,
        ];

        PemasukanInventaris::where('id', $id)->update($data);

        return redirect()->back()->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemasukanInventaris = PemasukanInventaris::find($id);
        $pemasukanInventaris->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
