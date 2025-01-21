<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaOverhead extends Model
{
    protected $table = 'biaya_overhead';

    protected $fillable = [
        'jenis_biaya',
        'jumlah',
    ];
}
