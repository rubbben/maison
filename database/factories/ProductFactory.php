<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9999),
        'size' => $faker->randomElement($array = array ('32','34','36','38','40','42','44','46','48','50','52')),
        'url_image' => $faker->sentence(),
        'status' => $faker->randomElement($array = array ('Publié', 'Brouillon')),
        'code' => $faker->randomElement($array = array ('solde', 'new')),
        'reference' => $faker->regexify('[A-Z0-9]{5,15}')
    ];
});
