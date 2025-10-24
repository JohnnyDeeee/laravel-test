<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coffees')->insert([
            [
                'name' => 'Ethiopian Yirgacheffe',
                'origin' => 'Ethiopia',
                'roast_date' => '2025-10-01',
                'stock' => 150,
            ],
            [
                'name' => 'Colombian Supremo',
                'origin' => 'Colombia',
                'roast_date' => '2025-10-05',
                'stock' => 200,
            ],
            [
                'name' => 'Kenyan AA',
                'origin' => 'Kenya',
                'roast_date' => '2025-10-10',
                'stock' => 100,
            ],
        ]);
    }
}
