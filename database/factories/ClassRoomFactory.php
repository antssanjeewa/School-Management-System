<?php

use Faker\Generator as Faker;

$factory->define(App\Model\ClasseRoom::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
