<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDepartmentsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $departments = [
            [
                'name' => '财务部'
            ],
            [
                'name' => '采购部'
            ],
            [
                'name' => '仓储部'
            ],
            [
                'name' => '计划部'
            ],
            [
                'name' => '品质部'
            ],
            [
                'name' => '人事行政部'
            ],
            [
                'name' => '生产部'
            ],
            [
                'name' => '市场部'
            ],
            [
                'name' => '项目部'
            ],
            [
                'name' => '销售部'
            ],
            [
                'name' => '研发部'
            ],
            [
                'name' => '总经办'
            ]
        ];

        DB::table('departments')->insert($departments);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('departments')->truncate();
    }
}
