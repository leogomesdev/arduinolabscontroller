<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reles', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name');
            $table->integer('pin')->unsigned();
            $table->integer('lab_id')->unsigned();
            $table->foreign('lab_id')
                  ->references('id')
                  ->on('labs')
                  ->onDelete('cascade');
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
        Schema::drop('reles');
    }
}
