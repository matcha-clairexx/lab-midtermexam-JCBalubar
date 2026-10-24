<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@school.edu'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'faculty@school.edu'],
            [
                'name' => 'Faculty User',
                'password' => Hash::make('password'),
            ]
        );
    }
}
