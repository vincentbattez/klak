<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    $name = $faker->catchPhrase;
    return [
        'id_project' => App\Project::all(['id'])->random(),
        'name'       => $name,
        'slug'       => str_slug($name, '-'),
        'content'    => $faker->realText(50),
        'status'     => rand(0,2),
    ];
});
