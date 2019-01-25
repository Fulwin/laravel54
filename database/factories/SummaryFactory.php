<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Summary::class, function (Faker\Generator $faker) {

    return [
        'type' => 'summary',
        'user_id' => $faker->numberBetween(1, 50),
        'title' => $faker->sentence(5),
        'content' => $faker->paragraph(30),
        'next_week_mission' => $faker->paragraph(10),
        'coordination' => $faker->paragraph(10),
        'year' => 2019,
        'week' => $faker->numberBetween(1, 6),
    ];
});
