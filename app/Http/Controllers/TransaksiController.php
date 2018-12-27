<?php

namespace App\Http\Controllers;

use App\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
	public function show(){
		$transaksis = transaksi::all();
        return view('dashboard.transaksi.index',compact('transaksis'));
    }
}
