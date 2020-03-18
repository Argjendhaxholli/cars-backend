<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nr_serik')->unique();
            $table->boolean('vaj_motorri')->default(false);
            $table->boolean('vaj_transmisionit')->default(false);
            $table->boolean('filteri_klimes')->default(false);
            $table->boolean('filteri_ajrit')->default(false);
            $table->boolean('filteri_naftes')->default(false);
            $table->string('km_from');
            $table->string('km_to');
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
        Schema::dropIfExists('history');
    }
}
