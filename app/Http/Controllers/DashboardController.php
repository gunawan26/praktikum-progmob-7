<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //



    public function Daerah(){
        return view('dashboard.daerah');
    }

    public function Bioskop(){
        return view('dashboard.bioskop');
    }

    public function AddKabupaten(Request $req){

    }

    public function AddProvinsi(Request $req){

    }
}
