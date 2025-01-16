<?php

namespace Database\Seeders;

use App\Models\BiayaPenyusutan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiayaPenyusutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiayaPenyusutan::create([
            'jenis_biaya' => 'Biaya Penyusutan',
            'jumlah' => 5,
            'harga' => 50.00,
            'masa_penyusutan' => '1 Tahun',
            'total' => 5 * 50.00,
        ]);
    }
}
