<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('logs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->integer('computer_id');
          $table->integer('circulation_flag');
          $table->timestamps('record_time');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }
}
