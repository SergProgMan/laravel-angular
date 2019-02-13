<?php

use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    $level = $faker->randomElement(['rookie', 'amateur', 'pro']);
    return [
        'name' => $faker->name,
        'level' => $level,
        'score' => $faker->numberBetween(0, 150),
        'Suspected' => $faker->numberBetween(0, 1),

    ];

});
