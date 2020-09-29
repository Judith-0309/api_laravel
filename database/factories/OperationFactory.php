<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Operation;
use Faker\Generator as Faker;

$factory->define(Operation::class, function (Faker $faker) {

    return [
        'compte_id' => $faker->randomDigitNotNull,
        'montant' => $faker->word,
        'date_operation' => $faker->text,
        'type_operation' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
