<?php

namespace App\Http\Controllers;

use App\bioskop;
use Illuminate\Http\Request;

class BioskopController extends Controller
{
	public function index(){
		$bioskops = bioskop::all();
        return view('dashboard.bioskop.index',compact('bioskops'));
    }
	public function show(){
		$bioskops = bioskop::all();
        return view('dashboard.bioskop.index',compact('bioskops'));
    }
	public function create(){
		$bioskops = bioskop::all();
        return view('dashboard.bioskop.create', compact('bioskops'));
	}
	public function store(Request $req){
		$data = [
            'nama_bioskop' => $req->nama_bioskop,
            'alamat' => $req->alamat,
			'harga' => $req->harga,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
		bioskop::insert($data);
		return redirect('admin/dashboard/bioskop');
	}
	
	public function edit($id){
		$bioskops = bioskop::where('id_bioskop', $id)->get();
        return view('dashboard.bioskop.edit', compact('bioskops'));
    }

    public function update(Request $req, $id){
		$data = [
            'nama_bioskop' => $req->nama_bioskop,
            'alamat' => $req->alamat,
			'harga' => $req->harga,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        $bioskops = bioskop::where('id_bioskop', $id)->update($data);
        return redirect('admin/dashboard/bioskop');
    }
	public function destroy($id){
        $bioskops = bioskop::where('id_bioskop', $id)->delete();
        return redirect('admin/dashboard/bioskop');
    }
}
