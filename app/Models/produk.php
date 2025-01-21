<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    
    protected $fillable = [
        'kategori_id', 
        'nama', 
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
}
