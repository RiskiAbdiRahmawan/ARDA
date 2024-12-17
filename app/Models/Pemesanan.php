<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    // Menentukan primary key yang digunakan
    protected $primaryKey = 'pemesanan_id';

    // Menentukan kolom-kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'user_id',
        'driver_id',
        'kendaraan_id',
        'tanggal_pemesanan',
        'status',
        'manager1_status',
        'manager2_status',
    ];

    // Menentukan jenis tipe data untuk kolom-kolom tertentu jika diperlukan
    protected $casts = [
        'tanggal_pemesanan' => 'date',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id');
    }
    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class,'kendaraan_id');
    }
}
