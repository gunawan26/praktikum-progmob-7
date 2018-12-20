<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIdKursiOnDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('detail_transaksis', function (Blueprint $table) {


            $table->dropForeign(['id_kursi']);
            $table->foreign('id_kursi')->references('id')->on('kursi_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        // Schema::table('detail_transaksis', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedInteger('id_kursi');
        //     $table->enum('status_kursi',[1,0]);



        //     $table->foreign('id_kursi')->references('id')->on('kursi_lists')->change();
        // });
    }
}
