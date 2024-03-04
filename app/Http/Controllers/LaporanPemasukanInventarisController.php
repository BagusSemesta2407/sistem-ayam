<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\PemasukanInventaris;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPemasukanInventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::get();

        return view('pemasukan-inventaris.form-tanggal', [
            'inventaris' => $inventaris
        ]);
    }

    public function data(Request $request)
    {
        $filter = (object)[
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'inventaris_id' => $request->inventaris_id
        ];

        $pemasukanInventaris = PemasukanInventaris::filter($filter)->get();
        $inventaris = Inventaris::get();

        return view('pemasukan-inventaris.report', [
            'pemasukanInventaris' => $pemasukanInventaris,
            'inventaris' => $inventaris
        ]);
    }

    public function getChartData()
    {
        $chartData = [['Month', 'Kg', 'Botol', ['role' => 'annotation']]];

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        foreach ($months as $month) {
            $rowData = [
                $month,
                PemasukanInventaris::where('satuan', 'Kg')->whereMonth('waktu', Carbon::parse($month)->month)->sum('kuantitas'),
                PemasukanInventaris::where('satuan', 'Botol')->whereMonth('waktu', Carbon::parse($month)->month)->sum('kuantitas'),
                '',
            ];

            array_push($chartData, $rowData);
        }

        return response()->json(['data' => $chartData]);
    }
}
