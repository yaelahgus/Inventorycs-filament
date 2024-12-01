<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Agus Arifudin',
            'username' => 'A11.2021.13736',
            'ipk' => '3.47',
            'password' => Hash::make('123123'),
            'role' => UserRole::Admin
        ]);

        User::factory(10)->create();
    }
}
