<?php

namespace App\Http\Controllers;

use App\Models\Ayam;
use App\Models\Kandang;
use App\Models\PemasukanAyam;
use App\Models\PengeluaranAyam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPemasukanAyamController extends Controller
{
    public function index()
    {
        $kandang = Kandang::all();

        return view('pemasukan-ayam.form', [
            'kandang' => $kandang
        ]);
    }

    public function data(Request $request)
    {
        $filter = (object)[
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'kandang_id' => $request->kandang_id
        ];

        $pemasukanAyam = PemasukanAyam::filter($filter)->get();
        $kandang = Kandang::get();

        return view('pemasukan-ayam.report', [
            'pemasukanAyam' => $pemasukanAyam,
            'kandang' => $kandang
        ]);
    }

    public function getChartData()
    {
        $ayam = Ayam::pluck('jenis')->toArray();
        $chartData = [['Month', ...$ayam, ['role' => 'annotation']]];

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        foreach ($months as $month) {
            $rowData = [
                $month,
            ];

            foreach ($ayam as $jenis) {
                $count = PemasukanAyam::with(['kandang.ayam'])
                    ->whereHas('kandang.ayam', function ($q) use ($jenis) {
                        return $q->where('jenis', $jenis);
                    })
                    ->whereMonth('tanggal_masuk', Carbon::parse($month)->month)
                    ->count();

                array_push($rowData, $count);
            }

            array_push($rowData, '');
            array_push($chartData, $rowData);
        }

        return response()->json(['data' => $chartData]);
    }
}
