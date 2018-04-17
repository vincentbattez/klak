<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'id_user'     => App\User::all(['id'])->random(),
        'id_team'     => App\Team::all(['id'])->random(),
        'name'        => $faker->domainWord,
        'img'         => $faker->imageUrl,
        'deadline'    => $faker->dateTime(),
    ];
});
