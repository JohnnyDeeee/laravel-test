<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            ['name' => 'Global Coffee Traders'],
            ['name' => 'Bean Supply Co.'],
            ['name' => 'Roast Masters Ltd.'],
        ]);
    }
}
