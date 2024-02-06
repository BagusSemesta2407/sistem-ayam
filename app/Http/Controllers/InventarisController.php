<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventarisRequest;
use App\Models\Inventaris;
use App\Models\PemasukanInventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = Inventaris::with('pemasukanInventaris')->get();

        return view('inventaris.index', [
            'inventaris' => $inventaris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventarisRequest $request)
    {
        Inventaris::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('inventaris.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventaris = Inventaris::find($id);

        return view('inventaris.edit', [
            'inventaris' => $inventaris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
        ];

        Inventaris::where('id', $id)->update($data);

        return redirect()->route('inventaris.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::find($id);

        $inventaris->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
