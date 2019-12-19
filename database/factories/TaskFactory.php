<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->paragraph(20),
        'user_id' => '1',
    ];
});
