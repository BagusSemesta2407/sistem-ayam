<?php

namespace Database\Seeders;

use App\Models\Ayam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AyamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ayam::create([
            'jenis' => 'Ayam Petelur'
        ]);
        Ayam::create([
            'jenis' => 'Ayam Potong'
        ]);
    }
}
