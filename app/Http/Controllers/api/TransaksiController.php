<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\carbon;

class TransaksiController extends Controller
{
    //

    public function transaksiKursi(Request $request){
        $transaksi = new transaksi;

        $getDateNow = carbon::now();
        $getLimitTrans = $getDateNow->addHours(2);


        $transaksi->tanggal_transaksi = $getDateNow;
        $transaksi->tanggal_batas_pembayaran = $getLimitTrans;
        $transaksi->status_pembayaran = 'menunggu';

    }


    protected function getCredentialId(){

        $cred = auth('api')->user()->id;

        return $cred;

    }
}
