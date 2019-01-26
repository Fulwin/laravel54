<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedPostsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $posts = [
            [
                'name' => 'ATE软件工程师'
            ],
            [
                'name' => 'DCC专员'
            ],
            [
                'name' => 'EDA工程师'
            ],
            [
                'name' => 'FAE工程师'
            ],
            [
                'name' => 'FW测试工程师'
            ],
            [
                'name' => 'FW软件工程师'
            ],
            [
                'name' => 'IPQC工程师'
            ],
            [
                'name' => 'IT管理员'
            ],
            [
                'name' => 'NPI工程师'
            ],
            [
                'name' => 'NPI经理'
            ],
            [
                'name' => 'OA软件工程师'
            ],
            [
                'name' => 'OQC工程师'
            ],
            [
                'name' => 'OSA产品经理'
            ],
            [
                'name' => 'OSA工程师'
            ],
            [
                'name' => 'PE工程师'
            ],
            [
                'name' => 'PE主管'
            ],
            [
                'name' => 'SQE工程师'
            ],
            [
                'name' => '包装组长'
            ],
            [
                'name' => '财务副总'
            ],
            [
                'name' => '财务经理'
            ],
            [
                'name' => '财务总监'
            ],
            [
                'name' => '采购主管'
            ],
            [
                'name' => '包装专员'
            ],
            [
                'name' => '仓储主管'
            ],
            [
                'name' => '仓库管理员'
            ],
            [
                'name' => '测试工程师'
            ],
            [
                'name' => '产品经理'
            ],
            [
                'name' => '厂务'
            ],
            [
                'name' => '出纳'
            ],
            [
                'name' => '会计'
            ],
            [
                'name' => '计划经理'
            ],
            [
                'name' => '计划专员'
            ],
            [
                'name' => '结构工程师'
            ],
            [
                'name' => '结构经理'
            ],
            [
                'name' => '品质工程师'
            ],
            [
                'name' => '品质经理'
            ],
            [
                'name' => '人事专员'
            ],
            [
                'name' => '软件经理'
            ],
            [
                'name' => '商务助理'
            ],
            [
                'name' => '生产经理'
            ],
            [
                'name' => '生产主管'
            ],
            [
                'name' => '生产总监'
            ],
            [
                'name' => '实验室管理'
            ],
            [
                'name' => '市场经理'
            ],
            [
                'name' => '市场专员'
            ],
            [
                'name' => '司机'
            ],
            [
                'name' => '物料员'
            ],
            [
                'name' => '项目管理员'
            ],
            [
                'name' => '项目主管'
            ],
            [
                'name' => '销售工程师'
            ],
            [
                'name' => '销售经理'
            ],
            [
                'name' => '销售总监'
            ],
            [
                'name' => '行政经理'
            ],
            [
                'name' => '行政专员'
            ],
            [
                'name' => '研发总监'
            ],
            [
                'name' => '硬件工程师'
            ],
            [
                'name' => '运营副总'
            ],
            [
                'name' => '运营总监'
            ],
            [
                'name' => '总经理'
            ],
            [
                'name' => '总经理助理'
            ],
        ];

        DB::table('posts')->insert($posts);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('posts')->truncate();
    }
}
