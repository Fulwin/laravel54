<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedLevelsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $levels = [
            [
                'name' => '助理/实习生',
                'lv' => 1,
                'sort' => 1
            ],
            [
                'name' => '工程师',
                'lv' => 2,
                'sort' => 2
            ],
            [
                'name' => '主管',
                'lv' => 3,
                'sort' => 3
            ],
            [
                'name' => '经理',
                'lv' => 4,
                'sort' => 4
            ],
            [
                'name' => '总监',
                'lv' => 5,
                'sort' => 5
            ],
            [
                'name' => '副总',
                'lv' => 6,
                'sort' => 6
            ],
            [
                'name' => '总经理',
                'lv' => 7,
                'sort' => 7
            ],
        ];

        DB::table('levels')->insert($levels);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('levels')->truncate();
    }
}
