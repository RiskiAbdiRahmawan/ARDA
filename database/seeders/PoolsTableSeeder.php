<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pool;

class PoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pool::create([
            'pool_id' => 1,
            'nama_pool' => 'Pool 1',
            'lokasi' => 'Jln Pool No 1',
        ]);

        Pool::create([
            'pool_id' => 2,
            'nama_pool' => 'Pool 2',
            'lokasi' => 'Jln Pool No 2',
        ]);
    }
}
