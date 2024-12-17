<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonsumsiBBM extends Model
{
    protected $primaryKey = 'konsumsi_bbm_id';
    protected $table = 'konsumsi_bbm'; // Pastikan ini sesuai dengan nama tabel di database
    protected $fillable = [
        'kendaraan_id',
        'tanggal',
        'jumlah_bbm',
        'biaya',
    ];

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class,'kendaraan_id');
    }
}
