<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'nama' => 'Pan Feeder',
            'jumlah' => 20,
        ]);
        Barang::create([
            'nama' => 'Tempat Minum',
            'jumlah' => 20,
        ]);
        Barang::create([
            'nama' => 'Tempat Telur',
            'jumlah' => 20,
        ]);
        Barang::create([
            'nama' => 'Tangga',
            'jumlah' => 20,
        ]);
        Barang::create([
            'nama' => 'Ember',
            'jumlah' => 20,
        ]);
    }
}
