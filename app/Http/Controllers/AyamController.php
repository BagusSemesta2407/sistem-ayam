<?php

namespace App\Http\Controllers;

use App\Http\Requests\AyamRequest;
use App\Models\Ayam;
use Illuminate\Http\Request;

class AyamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ayam = Ayam::all();

        return view('ayam.index', [
            'ayam' => $ayam
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ayam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AyamRequest $request)
    {
        Ayam::create([
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('ayam.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ayam $ayam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ayam $ayam)
    {
        $ayam = Ayam::find($ayam->id);

        return view('ayam.edit', [
            'ayam' => $ayam
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ayam $ayam)
    {
        $data = [
            'jenis' => $request->jenis
        ];

        Ayam::where('id', $ayam->id)->update($data);

        return redirect()->route('ayam.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ayam $ayam)
    {
        $ayam=Ayam::find($ayam->id);

        $ayam->delete();

        // return redirect()->back();
        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
