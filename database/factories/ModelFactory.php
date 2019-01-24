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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Summary::class, function (Faker\Generator $faker) {

    return [
        'type' => 'summary',
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->sentence(6),
        'content' => $faker->paragraph(30),
        'next_week_mission' => $faker->paragraph(10),
        'coordination' => $faker->paragraph(10),
        'year' => 2019,
        'week' => $faker->numberBetween(1, 6),
    ];
});
