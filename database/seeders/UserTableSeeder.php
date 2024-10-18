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
                'phone' => '01234567891',
                'role' => '1',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'points' => 20,
            ],
            [
                'name' => 'mahfuz',
                'username' => 'mahfuz',
                'phone' => '1234',
                'role' => '1',
                'email' => 'mahfuz@gmail.com',
                'password' => Hash::make('password'),
                'points' => 20,
            ],
            [
                'name' => 'admin',
                'username' => 'admin',
                'phone' => '01234567892',
                'role' => '2',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'points' => 20,
            ],
            [
                'name' => 'agent',
                'username' => 'agent',
                'phone' => '01234567893',
                'role' => '3',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('password'),
                'points' => 20, 
            ],
        ]);
    }
}
