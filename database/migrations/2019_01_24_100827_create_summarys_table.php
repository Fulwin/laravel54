<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summarys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('type')->default('summary');
            $table->string('title', 100);
            $table->text('content');
            $table->string('next_week_mission');
            $table->string('coordination');
            $table->string('cc');
            $table->string('shared');
            $table->integer('year');
            $table->integer('week');
            $table->integer('is_publish')->default(0);
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
        Schema::dropIfExists('summarys');
    }
}
