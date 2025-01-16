<?php

namespace Database\Seeders;

use App\Models\BiayaTetap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiayaTetapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiayaTetap::create([
            'jenis_biaya' => 'Biaya Tetap',
            'jumlah' => 5,
            'harga' => 50.00,
            'total' => 5 * 50.00,
        ]);
    }
}
