<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'SP7',
            'price' => 10020,
            'price_sale' => 1342,
            'description' => 'SP7 SP7 SP7 SP7',
            'quantity' => 10,
            'category_id' => 4,
            'memory_id' => 2,
            'trademark_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
            ], ['name' => 'SP8',
                'price' => 10230,
                'price_sale' => 1220,
                'description' => 'SP8 SP8 SP8 SP8',
                'quantity' => 12,
                'category_id' => 6,
                'memory_id' => 3,
                'trademark_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ], ['name' => 'SP9',
                'price' => 1040,
                'price_sale' => 12000,
                'description' => 'SP9 SP9 SP9 SP9',
                'quantity' => 120,
                'category_id' => 3,
                'memory_id' => 2,
                'trademark_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ]);
    }
}
