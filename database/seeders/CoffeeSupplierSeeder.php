<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoffeeSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coffee_supplier')->insert([
            ['coffee_id' => 1, 'supplier_id' => 1],
            ['coffee_id' => 1, 'supplier_id' => 2],
            ['coffee_id' => 2, 'supplier_id' => 2],
            ['coffee_id' => 2, 'supplier_id' => 3],
            ['coffee_id' => 3, 'supplier_id' => 1],
        ]);
    }
}
