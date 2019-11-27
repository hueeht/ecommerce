<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrademarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trademarks')->insert([
            ['name' => 'Apple'],
            ['name' => 'Samsung'],
            ['name' => 'Nokia'],
            ['name' => 'Oppo'],
            ['name' => 'Xiaomi'],
            ['name' => 'Huawei'],
            ['name' => 'Sony'],
            ['name' => 'Asus'],
            ['name' => 'Bkav'],
            ['name' => 'Vinmart'],
            ['name' => 'Realme'],
            ['name' => 'Vivo'],
        ]);
    }
}
