<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaPenyusutan extends Model
{
    protected $table = 'biaya_penyusutan';

    protected $fillable = [
        'jenis_biaya',
        'jumlah',
        'harga',
        'masa_penyusutan',
        'total',
    ];
}
