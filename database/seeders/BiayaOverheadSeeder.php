<?php

namespace Database\Seeders;

use App\Models\BiayaOverhead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiayaOverheadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiayaOverhead::create(
            [
                'jenis_biaya' => 'Biaya Overhead',
                'jumlah' => 5
            ]
        );
    }
}
