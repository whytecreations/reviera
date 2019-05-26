<?php

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        "text" => $faker->name,
        "description" => $faker->name,
    ];
});
