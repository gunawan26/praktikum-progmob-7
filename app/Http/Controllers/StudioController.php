<?php

namespace App\Http\Controllers;
use App\bioskop;
use App\studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
	public function index(){
		$studios = studio::all();
        return view('dashboard.studio.index',compact('studios'));
    }
	public function show(){
		$studios = studio::join('bioskops', 'bioskops.id_bioskop', '=', 'studios.id_bioskop')->select('studios.*', 'nama_bioskop')->get();
        return view('dashboard.studio.index',compact('studios'));
    }
	public function create(){
		$bioskops = bioskop::all();
        return view('dashboard.studio.create', compact('bioskops'));
	}
	public function store(Request $req){
		$data = [
            'id_bioskop' => $req->id_bioskop,
            'kode_studio' => $req->kode_studio,
            'kapasitas' => $req->kapasitas,
			'jumlah_baris' => $req->jumlah_baris,
			'jumlah_kolom' => $req->jumlah_kolom
        ];
		studio::insert($data);
		return redirect('admin/dashboard/studio');
	}
	public function edit($id){
        $bioskops = bioskop::all();
        $studios = studio::where('id_studio', $id)->get();
        return view('dashboard.studio.edit', compact('bioskops', 'studios'));
    }

    public function update(Request $req, $id){
        $data = [
            'id_bioskop' => $req->id_bioskop,
            'kode_studio' => $req->kode_studio,
            'kapasitas' => $req->kapasitas,
			'jumlah_baris' => $req->jumlah_baris,
			'jumlah_kolom' => $req->jumlah_kolom
        ];
        studio::where('id_studio', $id)->update($data);
        return redirect('admin/dashboard/studio');
    }

    public function destroy($id){
        studio::where('id_studio', '=', $id)->delete();
        return redirect('admin/dashboard/studio');
    }
}

