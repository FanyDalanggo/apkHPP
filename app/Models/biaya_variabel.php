<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class biaya_variabel extends Model
{
    // Nama tabel eksplisit (jika berbeda dari konvensi)
    protected $table = 'biaya_variabel';

    // Tentukan atribut yang dapat diisi (mass assignment)
    protected $fillable = [
        'jenis_biaya',
        'jumlah',
        'harga',
        'satuan',
        'total'
    ];
}

