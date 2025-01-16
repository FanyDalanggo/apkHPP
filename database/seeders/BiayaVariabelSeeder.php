<?php

namespace Database\Seeders;

use App\Models\BiayaVariabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiayaVariabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiayaVariabel::create([
            'jenis_biaya' => 'Biaya Listrik',
            'jumlah' => 5,
            'harga' => 50.00,
            'satuan' => 'pcs',
            'total' => 5 * 50.00,
        ]);
    }
}
