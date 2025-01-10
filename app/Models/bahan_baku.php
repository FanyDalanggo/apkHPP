<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan_baku extends Model
{
    use HasFactory;

    protected $table = 't_bahan_baku';
    protected $primaryKey = 'id_bahan_baku';
    protected $fillable = ['bahan_baku', 'jumlah', 'harga', 'id_satuan', 'id_jenis_bahan'];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }
}
