<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKursiListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kursi_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_jadwal');
            $table->boolean('status_kursi');
            $table->unsignedInteger('id_kursi');

            $table->foreign('id_jadwal')->references('id')->on('jadwal_films');
            $table->foreign('id_kursi')->references('id')->on('kursis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursi_lists');
    }
}
