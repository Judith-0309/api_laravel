<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClientParticulier;
use Faker\Generator as Faker;

$factory->define(ClientParticulier::class, function (Faker $faker) {

    return [
        'compte_id' => $faker->randomDigitNotNull,
        'nom' => $faker->text,
        'prenom' => $faker->text,
        'telephone' => $faker->word,
        'genre' => $faker->text,
        'email' => $faker->word,
        'adresse' => $faker->word,
        'profession' => $faker->text,
        'salarie' => $faker->text,
        'salaire_actuel' => $faker->word,
        'nom_employeur' => $faker->text,
        'cni' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
