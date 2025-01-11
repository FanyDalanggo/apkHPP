<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama' => 'Makanan'],
            ['nama' => 'Minuman'],
            ['nama' => 'Elektronik'],
            ['nama' => 'Pakaian'],
            ['nama' => 'Otomotif'],
            ['nama' => 'Kesehatan'],
            ['nama' => 'Kecantikan'],
            ['nama' => 'Olahraga'],
            ['nama' => 'Buku'],
            ['nama' => 'Mainan'],
        ];
    
        foreach ($categories as $category) {
            kategori::create($category);
        }
    }
    
}
