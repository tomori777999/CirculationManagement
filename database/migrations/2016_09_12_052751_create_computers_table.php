<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('computers', function(Blueprint $table)
      {
          $table->increments('id');
          $table->string('computer_name');
          $table->integer('circulation_flag');
          $table->integer('delete_flag')->default(0);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('computers');
    }
}
