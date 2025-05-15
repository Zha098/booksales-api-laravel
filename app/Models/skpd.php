<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skpd extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'skpd';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_skpd', 'id_skpd');
    }
}
