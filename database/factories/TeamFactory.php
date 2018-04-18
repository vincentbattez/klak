<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    $company = $faker->company;
    return [
        'name' => $company,
        'slug' => str_slug($company, '-'),
        'img'  => '',
        'imgSmall'  => '',
    ];
});
