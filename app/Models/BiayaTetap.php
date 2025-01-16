<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaTetap extends Model
{
    protected $table = 'biaya_tetap';

    protected $fillable = [
        'jenis_biaya',
        'jumlah',
        'harga',
        'total'
    ];
}
