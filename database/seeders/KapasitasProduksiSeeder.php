<?php

namespace Database\Seeders;

use App\Models\KapasitasProduksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KapasitasProduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KapasitasProduksi ::create([
            'produks_id' => 1,
            'kapasitas_perhari' => "100",
            'kapasitas_perbulan' => "1000",
            'jumlah_hari_kerja' => "5"
        ]);
    }
}
