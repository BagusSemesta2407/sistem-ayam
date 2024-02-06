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

        return view('pemasukan-inventaris.data', [
            'pemasukanInventaris' => $pemasukanInventaris
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pemasukanInventaris = PemasukanInventaris::find($id);
        $inventaris = Inventaris::all();

        return view('pemasukan-inventaris.edit', [
            'pemasukanInventaris' => $pemasukanInventaris,
            'inventaris' => $inventaris
        ]);
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

        return redirect()->route('kelola-pemasukan-inventaris.request-time-index');
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
