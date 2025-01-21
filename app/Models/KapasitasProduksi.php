<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KapasitasProduksi extends Model
{
    protected $table = 'kapasitas_produksi';

    protected $fillable = [
        'produks_id',
        'kapasitas_perhari',
        'kapasitas_perbulan',
        'jumlah_hari_kerja,'
    ];

    public function produks()
    {
        return $this->belongsTo(produk::class, 'produks_id');
    }
}
