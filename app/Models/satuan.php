<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    use HasFactory;

    protected $table = 't_satuan';
    protected $primaryKey = 'id_satuan';

    protected $fillable = ['satuan'];
    public function bahan_baku()
    {
        return $this->hasMany(bahan_baku::class, 'id_satuan', 'id_satuan');
    }
}
