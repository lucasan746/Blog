<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publicacion;
use Faker\Generator as Faker;

$factory->define(Publicacion::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'texto' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'img' => $faker->image('public/storage/', 400, 300, null, false),
        'user_id' => $faker->numberBetween($min = 1, $max = 30),
        'puntaje_promedio' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
