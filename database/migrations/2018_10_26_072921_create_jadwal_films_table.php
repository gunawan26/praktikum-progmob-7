<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_films', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_film');
            $table->unsignedInteger('id_studio');
            $table->dateTime('tanggal_tayang');
            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->foreign('id_film')->references('id')->on('films');
            $table->foreign('id_studio')->references('id')->on('studios');
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
        Schema::dropIfExists('jadwal_films');
    }
}
