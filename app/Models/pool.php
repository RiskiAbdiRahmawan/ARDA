<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pool extends Model
{
    protected $primaryKey = 'pool_id';
    protected $fillable = [
        'nama_pool',
        'lokasi',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'pool_id');
    }
}
