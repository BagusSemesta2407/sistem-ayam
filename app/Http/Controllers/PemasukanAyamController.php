<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemasukanAyamRequest;
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

    public function store(PemasukanAyamRequest $request)
    {
        PemasukanAyam::create($request->all());
       
        return redirect()->back()->withSuccess('Data berhasil ditambahkan');
    }
}
