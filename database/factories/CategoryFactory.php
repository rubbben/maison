<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement($array = array ('Homme', 'Femme')),
        'description' => $faker->paragraph()
    ];
});
