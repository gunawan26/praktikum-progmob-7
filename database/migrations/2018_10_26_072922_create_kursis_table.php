<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKursisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kursis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_studio');
            $table->string('kode_kursi');
            
            $table->foreign('id_studio')->references('id')->on('studios');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursis');
    }
}
