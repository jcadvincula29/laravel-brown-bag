<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'task' => $faker->words(),
        'description' => $faker->sentence()
    ];
});
