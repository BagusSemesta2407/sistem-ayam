<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventaris::create([
            'nama' => 'Dedak'
        ]);
        Inventaris::create([
            'nama' => 'Jagung Giling'
        ]);
        Inventaris::create([
            'nama' => 'Obat Amonium Klorida'
        ]);
        Inventaris::create([
            'nama' => 'Obat Kalsium Karbapenin'
        ]);
        Inventaris::create([
            'nama' => 'Vitamin K3'
        ]);
        Inventaris::create([
            'nama' => 'Sodium Selenite'
        ]);
        Inventaris::create([
            'nama' => 'Kalium Klorida'
        ]);
        Inventaris::create([
            'nama' => 'Fitase'
        ]);
        Inventaris::create([
            'nama' => 'Vitamin A'
        ]);
    }
}
