<?php

namespace App\Http\Controllers;

use App\Kursi_list;
use App\jadwal_film;
use App\kursi;
use Illuminate\Http\Request;

class KursiListController extends Controller
{
	public function index(){
		$kursi_lists = kursi_list::all();
		return view('dashboard.kursilist.index', compact('kursi_lists'));
    }
	public function show(){
		$kursi_lists = kursi_list::join('jadwal_films', 'jadwal_films.id_jadwal', '=', 'kursi_lists.id_jadwal')->join('kursis', 'kursis.id_kursi', '=', 'kursi_lists.id_kursi')->select('kursi_lists.*', 'tanggal_tayang','kode_kursi')->get();
        return view('dashboard.kursilist.index',compact('kursi_lists'));
	}
	public function create(){
		$jadwal_films = jadwal_film::all();
		$kursis  = kursi::all();
        return view('dashboard.kursilist.create', compact('jadwal_films','kursis'));
	}
	
	public function store(Request $req){
		$data = [
            'id_jadwal' => $req->id_jadwal,
            'status_kursi' => $req->status_kursi,
			'id_kursi' => $req->id_kursi
        ];
		kursi_list::insert($data);
		return redirect('admin/dashboard/kursilist');
	}
	public function edit($id){
		$jadwal_films = jadwal_film::all();
		$kursis  = kursi::all();
		$kursi_lists  = kursi_list::where('id_kursi', $id)->get();
        return view('dashboard.kursilist.edit', compact('jadwal_films', 'kursis','kursi_lists'));
    }

    public function update(Request $req, $id){
		$data = [
            'id_jadwal' => $req->id_jadwal,
            'status_kursi' => $req->status_kursi,
			'id_kursi' => $req->id_kursi
        ];
        $kursi_lists  = kursi_list::where('id_kursi_list', $id)->update($data);
        return redirect('admin/dashboard/kursilist');
    }
	public function destroy($id){
        $kursi_lists  = kursi_list::where('id_kursi_list', $id)->delete();
        return redirect('admin/dashboard/kursilist');
    }
}