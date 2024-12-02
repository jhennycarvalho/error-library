<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin.biblioteca@et.edu.br',
            'password' => Hash::make('@Admin2024et'),  // Criptografando a senha
        ]);
    }
}
