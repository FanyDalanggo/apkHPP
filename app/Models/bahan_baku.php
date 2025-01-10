<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bahan_baku extends Model
{
    protected $table = 'bahan_baku';

    protected $fillable = [
        'bahan',
        'jenis_bahan_id',
        'satuan_id'
    ];
}
