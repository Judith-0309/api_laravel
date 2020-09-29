<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Compte;
use Faker\Generator as Faker;

$factory->define(Compte::class, function (Faker $faker) {

    return [
        'type_compte' => $faker->word,
        'numero_compte' => $faker->word,
        'cle_rib' => $faker->word,
        'etat_compte' => $faker->text,
        'depot_initial' => $faker->word,
        'date_ouverture' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
