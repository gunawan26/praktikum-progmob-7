<?php

namespace App\Http\Controllers;
use App\jadwal_film;
use App\kategori_umur;
use Illuminate\Http\Request;

class UmurController extends Controller
{
	public function index(){
		$jadwal_films = jadwal_film::all();
        return view('dashboard.jadwal_film.index',compact('jadwal_films'));
    }
	
	public function create(){
		$kategori_umurs = kategori_umur::all();
        return view('dashboard.umur.create', compact('kategori_umurs'));
	}
	public function store(Request $req){
		$data = [
            'nama_kategori' => $req->nama_kategori,
			'min_umur' => $req->min_umur,
			'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
		kategori_umur::insert($data);
		return redirect('admin/dashboard/umur');
	}
}

