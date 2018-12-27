<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaerahController extends Controller
{
    //
    public function Show(){
        return view('dashboard.daerah.index');
    }
}
