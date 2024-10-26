<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class unitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('units')->insert([
            [
                'unit' => 'kg',
                'name' => 'Kilogram',
            ],
            [
                'unit' => 'l',
                'name' => 'Litre',
            ],
            [
                'unit' => 'g',
                'name' => 'Gram',
            ],
            [
                'unit' => 'ml',
                'name' => 'Millilitre',
            ],
            [
                'unit' => 'm',
                'name' => 'Meter',
            ],
            [
                'unit' => 'cm',
                'name' => 'Centimeter',
            ],
            [
                'unit' => 'mm',
                'name' => 'Millimeter',
            ],
            [
                'unit' => 'ft',
                'name' => 'Foot',
            ],
            [
                'unit' => 'in',
                'name' => 'Inch',
            ],
            [
                'unit' => 'pcs',
                'name' => 'Pieces',
            ],
            [
                'unit' => 'doz',
                'name' => 'Dozen',
            ],
            [
                'unit' => 'ton',
                'name' => 'Ton',
            ],
        ]);
    }
}
