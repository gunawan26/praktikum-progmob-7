<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_film');
            $table->enum('status_tayang',[1,0]);
            $table->text('deskripsi');
            $table->time('durasi');
            $table->unsignedSmallInteger('id_genre');
            $table->unsignedSmallInteger('id_kategori_umur');


            $table->foreign('id_genre')->references('id')->on('genre_films');
            $table->foreign('id_kategori_umur')->references('id')->on('kategori_umurs');
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
        Schema::dropIfExists('films');
    }
}
