<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $projectName = $faker->domainWord;
    return [
        'id_user'     => App\User::all(['id'])->random(),
        'id_team'     => App\Team::all(['id'])->random(),
        'name'        => $projectName,
        'slug'        => str_slug($projectName, '-'),
        'img'         => '',
        'imgSmall'    => '',
        'deadline'    => $faker->dateTime(),
    ];
});
