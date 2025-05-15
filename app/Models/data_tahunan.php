<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_tahunan extends Model
{
    use HasFactory;
    protected $fillable = ['id_daftar_data', 'id_skpd', 'tahun', 'satuan', 'keterangan', 'nilai'];
    protected $table = 'data_tahunan';
}
