<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Catdegory;

$factory->define(Catdegory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'parent_id' => 1,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
