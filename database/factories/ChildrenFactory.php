<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Children::class, function (Faker $faker) {
    return [
        'reg_number' => $faker->name,
        'name' => $faker->name,
        'b_day' => $faker->name,
        'gender' => $faker->name,
        'address' => $faker->name,
        'parent_name' => $faker->name,
        'contact_number' => $faker->name
    ];
});