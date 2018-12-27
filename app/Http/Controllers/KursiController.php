<?php

namespace App\Http\Controllers;

use App\studio;
use App\kursi;
use Illuminate\Http\Request;

class KursiController extends Controller
{
	public function index(){
		$kursis = kursi::all();
		return view('dashboard.kursilist.index', compact('kursi_lists'));
    }
	public function show(){
		$kursis= kursi::join('studios', 'studios.id_studio', '=', 'kursis.id_studio')->select('kursis.*', 'kode_studio')->get();
        return view('dashboard.kursilist.index',compact('kursis'));
	}
	public function create(){
		$studios = studio::all();
        return view('dashboard.kursi.create', compact('studios'));
	}
	public function store(Request $req){
		$data = [
            'id_studio' => $req->id_studio,
			'kode_kursi' => $req->kode_kursi
        ];
		kursi::insert($data);
		return redirect('admin/dashboard/kursilist');
	}
}