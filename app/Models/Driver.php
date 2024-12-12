<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $primaryKey = 'driver_id';
    protected $fillable = [
        'nama',
        'nomor_lisensi',
        'nomor_telepon',
        'user_id',
    ];

    public function user(){
      return $this->belongsTo(User::class,'user_id');  
    }
}
