<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPemakaian extends Model
{
    protected $primaryKey = 'riwayat_pemakaian_id';
    protected $fillable = [
        'kendaraan_id',
        'tanggal',
        'tujuan',
        'deskripsi',
    ];

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class,'kendaraan_id');
    }
}
