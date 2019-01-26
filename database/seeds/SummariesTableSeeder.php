<?php

use Illuminate\Database\Seeder;
use App\Models\Summary;

class SummariesTableSeeder extends Seeder
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

        // 模板类型
        $types = ['common', 'resource'];

        $faker = app(Faker\Generator::class);

        $summaries = factory(Summary::class)->times(100)->make()->each(
            function ($summary, $index) use ($user_ids, $types, $faker) {
                // 从用户 ID 数组中随机取出一个并赋值
                $summary->user_id = $faker->randomElement($user_ids);

                // 从模板类型中随机取出一个并赋值
                $summary->type = $faker->randomElement($types);
            }
        );

        Summary::insert($summaries->toArray());
    }
}
