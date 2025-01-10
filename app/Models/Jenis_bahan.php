<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_bahan extends Model
{
    use HasFactory;

    protected $table = 't_jenis_bahan';
    protected $primaryKey = 'id_jenis_bahan';

    protected $fillable = ['jenis_bahan'];
}
