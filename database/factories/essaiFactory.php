<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\essai;
use Faker\Generator as Faker;

$factory->define(essai::class, function (Faker $faker) {

    return [
        'nom' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
