<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('summaries')->comment('模板类型');
            $table->integer('user_id')->comment('创建用户id');
            $table->tinyInteger('is_publish')->default(0)->comment('是否发布，默认为未发布0，发布为1');
            $table->string('title', 100)->comment('总结标题');
            $table->text('content')->nullable()->comment('总结内容');
            $table->text('next_week_mission')->comment('下周任务');
            $table->text('coordination')->nullable()->comment('协调事项');
            $table->integer('year')->comment('发布年份');
            $table->integer('week')->comment('发布周');
            $table->string('cc')->nullable()->comment('抄送人');
            $table->string('allowed')->nullable()->comment('允许查看的用户');
            $table->dateTime('published_at')->nullable()->comment('发布时间');
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
        Schema::dropIfExists('summaries');
    }
}
