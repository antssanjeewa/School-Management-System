<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Teacher::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'b_day' => $faker->name,
        'gender' => $faker->name,
        'address' => $faker->name,
        'contact_number' => $faker->name
    ];
});
