<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwaresTable extends Migration 
{
	public function up()
	{
		Schema::create('softwares', function(Blueprint $table) {
            $table->increments('id');
            $table->string('type')->comment('软件类型');
            $table->string('no')->comment('项目编号');
            $table->string('name')->comment('项目名称');
            $table->string('mcu')->nullable()->comment('主控MCU');
            $table->integer('user_id')->unsigned()->comment('创建用户id');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->string('describe')->comment('项目描述');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('softwares');
	}
}
