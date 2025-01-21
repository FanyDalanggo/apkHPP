<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'hpp',
            'email' => 'hpp@gmail.com',
            'password' => hash::make('123'),
        ]);

        $this->call(
            [
                BiayaVariabelSeeder::class,
                BiayaPenyusutanSeeder::class,
                BiayaTetapSeeder::class,
                KategoriSeeder::class,
                BiayaOverheadSeeder::class,
                ProdukSeeder::class,
                KapasitasProduksiSeeder::class,
            ]
        );
    }
}
