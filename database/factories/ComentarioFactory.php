<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        'comentario' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'ipublicacion_id' => $faker->numberBetween($min = 1, $max = 30),
        'user_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});
