<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('history_id');
            $table->string('name');
            $table->string('nr_regjistrimit');
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('history_id')->references('id')->on('history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
