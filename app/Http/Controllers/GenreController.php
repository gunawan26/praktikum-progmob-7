<?php

namespace App\Http\Controllers;
use App\jadwal_film;
use App\genre_film;
use Illuminate\Http\Request;

class GenreController extends Controller
{
	public function index(){
		$jadwal_films = jadwal_film::all();
        return view('dashboard.jadwal_film.index',compact('jadwal_films'));
    }
	
	public function create(){
		$genre_films = genre_film::all();
        return view('dashboard.genre.create', compact('bioskops'));
	}
	public function store(Request $req){
		$data = [
            'nama_genre' => $req->nama_genre,
			'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
		genre_film::insert($data);
		return redirect('admin/dashboard/genre');
	}
}

