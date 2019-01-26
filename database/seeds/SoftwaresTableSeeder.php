<?php

use Illuminate\Database\Seeder;
use App\Models\Software;

class SoftwaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 用户id集合
        $user_ids = \App\Models\User::all()->pluck('id')->toArray();

        // 项目类型
        $types = ['Firmware', 'ATE'];

        $faker = app(Faker\Generator::class);

        $softwares = factory(Software::class)->times(50)->make()->each(
            function ($software, $index) use ($user_ids, $types, $faker) {
                $software->user_id = $faker->randomElement($user_ids);
                $software->type = $faker->randomElement($types);
            }
        );

        Software::insert($softwares->toArray());
    }

}

