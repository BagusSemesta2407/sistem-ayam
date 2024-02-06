<?php

namespace App\Http\Controllers;

use App\Http\Requests\KandangRequest;
use App\Models\Ayam;
use App\Models\Kandang;
use Illuminate\Http\Request;

class KandangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandang = Kandang::with('pemasukanAyam')->get();
        return view('kandang.index', [
            'kandang' => $kandang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ayam = Ayam::all();
        return view('kandang.create', [
            'ayam' => $ayam
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KandangRequest $request)
    {
        $kandang= Kandang::create([
            'ayam_id' => $request->ayam_id,
            'kapasitas' => $request->kapasitas
        ]);

        $kandang->update([
            'kode_kandang' =>  'KDG-'.sprintf("%03d",$kandang->id),
        ]);

        return redirect()->route('kandang.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kandang $kandang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kandang $kandang)
    {
        $ayam = Ayam::all();
        $kandang = Kandang::find($kandang->id);

        return view('kandang.edit', [
            'ayam' => $ayam,
            'kandang' => $kandang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandang $kandang)
    {
        $data = [
            'ayam_id' => $request->ayam_id,
            'kapasitas' => $request->kapasitas
        ];

        Kandang::where('id', $kandang->id)->update($data);

        return redirect()->route('kandang.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kandang $kandang)
    {
        $kandang = Kandang::find($kandang->id);
        $kandang->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
