<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal_transaksi');
            $table->dateTime('tanggal_batas_pembayaran');
            $table->enum('status_pembayaran',['sudah_bayar','batal','sedang_proses','menunggu']);
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jadwal');
            $table->string('bukti_pembayaran')->nullable();
            $table->dateTime('tanggal_pembayaran')->nullable();
            


            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_jadwal')->references('id')->on('jadwal_films');
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
        Schema::dropIfExists('transaksis');
    }
}
