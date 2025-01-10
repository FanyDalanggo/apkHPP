<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $fillable = ['kategori_id', 'nama', 'deskripsi'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
