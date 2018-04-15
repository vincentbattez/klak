<?php

use Faker\Generator as Faker;

$factory->define(App\Timer::class, function (Faker $faker) {
    $date = $faker->dateTime();
    return [
        'id_task'    => App\Task::all(['id'])->random(),
        'id_user'    => App\User::all(['id'])->random(),
        'start_time' => $date,
        'end_time'   => $faker->dateTime($date),
    ];
});
