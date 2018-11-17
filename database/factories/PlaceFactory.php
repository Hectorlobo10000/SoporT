<?php

use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {
    return [
        'domain' => $faker->word,
        'municipality' => $faker->city,
        'address' => $faker->word,
    ];
});
