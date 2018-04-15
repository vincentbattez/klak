<?php

use Faker\Generator as Faker;

$factory->define(App\TeamUsers::class, function (Faker $faker) {
    return [
        'id_user' => App\User::all(['id'])->random(),
        'id_team' => App\Team::all(['id'])->random(),
    ];
});
