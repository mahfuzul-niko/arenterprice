<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'username' => 'user',
                'phone' => '1111',
                'role' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'points' => 20,
            ],
           
            [
                'name' => 'admin',
                'username' => 'admin',
                'phone' => '2222',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'points' => 20,
            ],
            [
                'name' => 'agent',
                'username' => 'agent',
                'phone' => '3333',
                'role' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('password'),
                'points' => 20, 
            ],
        ]);
    }
}
