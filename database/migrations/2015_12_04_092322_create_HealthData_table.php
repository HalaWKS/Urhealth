<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthdata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('height')->nullable();//身高
            $table->string('weight')->nullable();//体重
            $table->string('heart_rate')->nullable();//心率
            $table->string('blood_pressure')->nullable();//血压
            $table->string('sleep_time')->nullable();//当天睡眠时间
            $table->string('steps')->nullable();//当天行走步数
            $table->date('date')->nullable();//数据所属日期
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
        Schema::drop('healthdata');
    }
}
