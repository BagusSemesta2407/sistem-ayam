<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanProduksiController extends Controller
{
    public function index()
    {
        $produksi = Produksi::all();

        return view('produksi.report', [
            'produksi' => $produksi
        ]);
    }

    public function getChartData()
    {
        $chartData = [['Month', 'Normal', 'Pecah', 'Terjual', 'Busuk', 'Putih', 'Jumbo', ['role' => 'annotation']]];

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        foreach ($months as $month) {
            $rowData = [
                $month,
                Produksi::where('status', 'Normal')->whereMonth('tanggal', Carbon::parse($month)->month)->sum('kuantitas'),
                Produksi::where('status', 'Pecah')->whereMonth('tanggal', Carbon::parse($month)->month)->sum('kuantitas'),
                Produksi::where('status', 'Terjual')->whereMonth('tanggal', Carbon::parse($month)->month)->sum('kuantitas'),
                Produksi::where('status', 'Busuk')->whereMonth('tanggal', Carbon::parse($month)->month)->sum('kuantitas'),
                Produksi::where('status', 'Putih')->whereMonth('tanggal', Carbon::parse($month)->month)->sum('kuantitas'),
                Produksi::where('status', 'Jumbo')->whereMonth('tanggal', Carbon::parse($month)->month)->sum('kuantitas'),
                '',
            ];

            array_push($chartData, $rowData);
        }

        return response()->json(['data' => $chartData]);
    }
}
