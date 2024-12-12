<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $primaryKey = 'kendaraan_id';
    protected $fillable =[
        'nama',
        'jenis',
        'status',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function konsumsiBBM(){
        return $this->hasMany(konsumsiBBM::class,'kendaraan_id');
    }

    public function riwayatPemakaian(){
        return $this->hasMany(RiwayatPemakaian::class,'kendaraan_id');
    }
}
