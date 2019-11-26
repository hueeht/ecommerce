<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'root',
            'parent_id' => 0,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'name' => 'mobile',
            'parent_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'name' => 'smart phone',
            'parent_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'name' => 'telephone',
            'parent_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'name' => 'IOS',
            'parent_id' => 3,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'name' => 'Android',
            'parent_id' => 3,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
