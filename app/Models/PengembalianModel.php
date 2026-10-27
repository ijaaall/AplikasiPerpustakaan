<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengembalianModel extends Model
{
    //
    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';

    protected $fillable = [
        'id_peminjaman',
        'tanggal_kembali',
        'terlambat_hari',
        'denda',
    ];

    public function Peminjaman()
    {
        return $this->belongsTo(PeminjamanModel::class, 'id_peminjaman');
    }
}
