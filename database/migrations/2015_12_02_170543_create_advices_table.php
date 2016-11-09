<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('creator_id')->nullable();
            $table->string('creator_name')->nullable();
            $table->string('request')->nullable();
            $table->string('receiver_type')->nullable();
            $table->string('receiver_id')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('reply')->nullable();
            $table->string('is_replied')->nullable();
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
        Schema::drop('advices');
    }
}
