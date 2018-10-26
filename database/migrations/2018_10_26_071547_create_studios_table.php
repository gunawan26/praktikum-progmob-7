<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('id_bioskop');
            $table->string('kode_studio');
            $table->unsignedSmallInteger('kapasitas');
            $table->unsignedSmallInteger('jumlah_baris');
            $table->unsignedSmallInteger('jumlah_kolom');
            $table->foreign('id_bioskop')->references('id')->on('bioskops');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studios');
    }
}
