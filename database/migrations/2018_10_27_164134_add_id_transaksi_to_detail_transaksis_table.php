<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdTransaksiToDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_transaksis', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("id_transaksi");
            
            $table->foreign('id_transaksi')->references('id')->on('transaksis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_transaksis', function (Blueprint $table) {
            //
        });
    }
}
