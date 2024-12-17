<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPemakaian extends Model
{
    protected $primaryKey = 'riwayat_pemakaian_id';
    protected $fillable = [
        'kendaraan_id',
        'pemesanan_id',
        'tanggal'
    ];

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class,'kendaraan_id');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
}
