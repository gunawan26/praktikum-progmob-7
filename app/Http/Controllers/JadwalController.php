<?php

namespace App\Http\Controllers;
use App\jadwal_film;
use App\film;
use App\studio;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
	public function index(){
		$jadwal_films = jadwal_film::all();
        return view('dashboard.jadwal_film.index',compact('jadwal_films'));
    }
	public function show(){
		$jadwal_films = jadwal_film::join('films', 'films.id_film', '=', 'jadwal_films.id_film')->join('studios', 'studios.id_studio', '=', 'jadwal_films.id_studio')->select('jadwal_films.*', 'nama_film','kode_studio')->get();
        return view('dashboard.jadwal_film.index',compact('jadwal_films'));
    }
	public function create(){
		$studios = studio::all();
		$films  = film::all();
        return view('dashboard.jadwal_film.create', compact('films','studios'));
	}
	public function store(Request $req){
		$data = [
            'id_film' => $req->id_film,
            'id_studio' => $req->id_studio,
            'tanggal_tayang' => date("Y-m-d H:i:s"),
			'jam_mulai' => date("H:i:s"),
			'jam_selesai' => date("H:i:s"),
			'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
		jadwal_film::insert($data);
		return redirect('admin/dashboard/jadwal_film');
	}
	public function edit($id){
		$studios = studio::all();
		$films  = film::all();
        $jadwal_films = jadwal_film::where('id_jadwal', $id)->get();
        return view('dashboard.jadwal_film.edit', compact('studios', 'films','jadwal_films'));
    }

    public function update(Request $req, $id){
		$data = [
            'id_film' => $req->id_film,
            'id_studio' => $req->id_studio,
            'tanggal_tayang' => date("Y-m-d H:i:s"),
			'jam_mulai' => date("H:i:s"),
			'jam_selesai' => date("H:i:s"),
			'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        jadwal_films::where('id_jadwal', $id)->update($data);
        return redirect('admin/dashboard/jadwal_film');
    }
	public function destroy($id){
        jadwal_film::where('id_jadwal', '=', $id)->delete();
        return redirect('admin/dashboard/jadwal_film');
    }
}

