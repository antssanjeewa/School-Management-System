<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'teacher_id' => $faker->numberBetween($min=1, $max=5)
    ];
});
