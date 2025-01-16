<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaVariabel extends Model
{
     protected $table = 'biaya_variabel';

     protected $fillable = [
         'jenis_biaya',
         'jumlah',
         'harga',
         'satuan',
         'total'
     ];
}
