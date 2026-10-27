<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    //
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'tanggal_peminjaman',
        'tanggal_harus_kembali',
        'id_anggota',
        'id_buku',
        'id_petugas',
        'status',
    ];

    public function Anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_anggota');
    }
    public function BUku()
    {
        return $this->belongsTo(BukuModel::class, 'id_buku');
    }
    public function Petugas()
    {
        return $this->belongsTo(PetugasModel::class, 'id_petugas');
    }
}
