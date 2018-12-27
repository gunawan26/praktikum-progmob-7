<?php

namespace App\Http\Controllers;
use App\kategori_umur;
use App\genre_film;
use App\film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
	public function index(){
		$films = film::all();
		$tayang = film::where('status_tayang', '1')->get();
        $tidak_tayang = film::where('status_tayang', '0')->get();
        return view('dashboard.film.index',compact('films','tayang','tidak_tayang'));
    }
	
	public function show(){
		$films = film::join('genre_films', 'genre_films.id_genre', '=', 'films.id_genre')->join('kategori_umurs', 'kategori_umurs.id_kategori_umur', '=', 'films.id_kategori_umur')->select('films.*', 'nama_kategori', 'nama_genre')->get();  
        $tayang = film::where('status_tayang', '1')->get();
        $tidak_tayang = film::where('status_tayang', '0')->get();
		return view('dashboard.film.index',compact('films','tayang','tidak_tayang'));
    }
	public function create(){
		$genre_films 	= genre_film::all();
		$kategori_umurs = kategori_umur::all();
		return view('dashboard.film.create', compact('kategori_umurs','genre_films'));
	}
	public function store(Request $req){
		$file = $req->file('foto_film');
        $format = $file->getClientOriginalExtension();
        $name = $req->username.'.'.$format;
        $file->move('img/profil', $name);
		
		$data = [
            'nama_film' => $req->nama_film,
            'status_tayang' => $req->status_tayang,
			'deskripsi'=> $req->deskripsi,
			'durasi' => date("H:i:s"),
            'id_genre' => $req->id_genre,
			'id_kategori_umur' => $req->id_kategori_umur,
            'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s"),
			'tgl_mulai' => date("Y-m-d H:i:s"),
			'tanggal_selesai' => date("Y-m-d H:i:s"),
			'foto_film' =>$name
        ];
		film::insert($data);
		return redirect('admin/dashboard/film');
	}
	public function edit($id){
		$genre_films 	= genre_film::all();
		$kategori_umurs = kategori_umur::all();
        $films = film::where('id_film', $id)->get();
        return view('dashboard.film.edit', compact('films', 'kategori_umurs','genre_films'));
    }

    public function update(Request $req, $id){
		$file = $req->file('foto_film');
        $format = $file->getClientOriginalExtension();
        $name = $req->username.'.'.$format;
        $file->move('img/profil', $name);
		
		$data = [
            'nama_film' => $req->nama_film,
            'status_tayang' => $req->status_tayang,
			'deskripsi'=> $req->deskripsi,
			'durasi' => date("H:i:s"),
            'id_genre' => $req->id_genre,
			'id_kategori_umur' => $req->id_kategori_umur,
            'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s"),
			'tgl_mulai' => date("Y-m-d H:i:s"),
			'tanggal_selesai' => date("Y-m-d H:i:s"),
			'foto_film' =>$name
        ];
        film::where('id_film', $id)->update($data);
        return redirect('admin/dashboard/film');
    }
	public function destroy($id){
        film::where('id_film', '=', $id)->delete();
        return redirect('admin/dashboard/film');
    }
}

