<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account')->unique()->comment('账号');
            $table->string('name')->comment('用户姓名');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password', 60)->comment('密码');
            $table->string('avatar')->nullable()->comment('头像');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->tinyInteger('gender')->default(1)->comment('性别 0:女 1:男');
            $table->integer('department_id')->nullable()->comment('部门id');
            $table->integer('report_id')->nullable()->comment('汇报关系id');
            $table->integer('level_id')->nullable()->comment('级别id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
