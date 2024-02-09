<?php

namespace App\Http\Controllers;

use App\Models\PemasukanInventaris;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPemasukanInventarisController extends Controller
{
    public function index()
    {
        $pemasukanInventaris = PemasukanInventaris::all();

        return view('pemasukan-inventaris.report',[
            'pemasukanInventaris' => $pemasukanInventaris
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
