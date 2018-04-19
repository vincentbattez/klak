<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    $name = $faker->catchPhrase;
    return [
        'id_project' => App\Project::all(['id'])->random(),
        'id_user'    => App\User::all(['id'])->random(),
        'name'       => $name,
        'status'     => rand(0,2),
    ];
});
