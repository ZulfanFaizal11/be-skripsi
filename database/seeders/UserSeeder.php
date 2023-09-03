<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // customer
        User::create([
            'name' => 'Zulfan Faizal',
            'email' => 'zulfan@example.com',
            'password' => Hash::make('password'),
            'role' => RoleEnum::CUSTOMER,
            'no_hp' => '123456789',
        ]);

        // admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => RoleEnum::ADMIN,
            'no_hp' => '11223344',
        ]);

        // pengelola
        User::create([
            'name' => 'Pengelola',
            'email' => 'pengelola@example.com',
            'password' => Hash::make('password'),
            'role' => RoleEnum::PENGELOLA,
            'no_hp' => '123123123123',
        ]);
    }
}