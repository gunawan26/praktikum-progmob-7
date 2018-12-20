<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBuktiPembayaranTanggalPembayaranOnTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
{
    DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
}
    public function up()
    {
        //
        Schema::table('transaksis', function (Blueprint $table) {

            $table->string('bukti_pembayaran')->nullable()->change();
            $table->dateTime('tanggal_pembayaran')->nullable()->change();

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
    }
}
