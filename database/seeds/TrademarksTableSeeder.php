<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Apple',
        ]);
        DB::table('trademarks')->insert([
            'name' => 'Samsung',
        ]);
        DB::table('trademarks')->insert([
            'name' => 'HTC',
        ]);
        DB::table('trademarks')->insert([
            'name' => 'Kaori',
        ]);
        DB::table('trademarks')->insert([
            'name' => 'InuYasha',
        ]);
        DB::table('trademarks')->insert([
            'name' => 'Levi',
        ]);
        DB::table('trademarks')->insert([
            'name' => 'Conan',
        ]);
    }
}
