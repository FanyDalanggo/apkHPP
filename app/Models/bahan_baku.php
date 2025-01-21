<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bahan_baku extends Model
{
    protected $table = 'bahan_baku';

    protected $fillable = [
        'bahan',
        'harga',
        'satuan',
    ];
}
