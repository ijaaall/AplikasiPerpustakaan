<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    //
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'penulis',
        'stok',
    ];
}
