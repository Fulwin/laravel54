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

    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();

    // 传参为生成最大时间不超过，创建时间永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'title' => $faker->sentence(5),
        'content' => $faker->text(),
        'next_week_mission' => $faker->paragraph(10),
        'coordination' => $faker->paragraph(10),
        'year' => 2018,
        'week' => $faker->numberBetween(1, 50),
        'published_at' => $updated_at,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
