<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memories')->insert([
            [
                'name' => '4GB/64GB'
            ],
            [
                'name' => '4GB/256GB'
            ],
            [
                'name' => '4GB/128GB'
            ],
            [
                'name' => '6GB/128GB'
            ],
            [
                'name' => '6GB/256GB'
            ],
            [
                'name' => '3GB/32GB'
            ],
            [
                'name' => '3GB/64GB'
            ],
            [
                'name' => '8GB/128GB'
            ],
            [
                'name' => '8GB/256GB'
            ],
        ]);
    }
}
