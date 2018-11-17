<?php

use Faker\Generator as Faker;

$factory->define(App\TaskType::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomLetter,
    ];
});
