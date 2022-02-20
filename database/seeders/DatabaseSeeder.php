<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(['name' => 'admin', 'email' => 'admin@binus.edu', 'password' => Hash::make('admin@123'), 'role' => 'admin']);
        \App\Models\User::create(['name' => 'user', 'email' => 'user@binus.edu', 'password' => Hash::make('user@123'), 'role' => 'user']);
    }
}
