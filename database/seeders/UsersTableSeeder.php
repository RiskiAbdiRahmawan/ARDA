<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => 1,
            'nama' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminutama'),
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => 2,
            'nama' => 'Manager Operasional',
            'email' => 'manager@example.com',
            'password' => Hash::make('manageroperasional'),
            'role' => 'manager',
        ]);
    }
}
