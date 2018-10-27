<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class TestApiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }


    public function helloWorld()
    {
        return response()->json([
            'msg' => 'sometimes we love someone we cant have'



        ]);
    }
}
