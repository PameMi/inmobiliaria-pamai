<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
        'name' => 'Admin PAMAI',
        'email' => 'admin@pamai.com',
        'password' => bcrypt('12345678'), // Usamos bcrypt directamente para asegurar compatibilidad
        'role' => 'admin',
        'email_verified_at' => now(),
    ]);
    }
}