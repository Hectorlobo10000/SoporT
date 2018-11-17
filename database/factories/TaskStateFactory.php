<?php

use Faker\Generator as Faker;

$factory->define(App\TaskState::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomLetter,
    ];
});
