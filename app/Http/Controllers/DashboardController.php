<?php

namespace App\Http\Controllers;

session_start();

use App\bioskop;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function Daerah(){
        return view('dashboard.daerah');
    }
    public function Bioskop(){
		$bioskops = bioskop::all();
        return view('dashboard.bioskop', compact('bioskops'));
    }
	public function Seatplan(){
		return view('dashboard.seatplan');
	}
	public function Createbioskop(){
		$bioskops = bioskop::all();
        return view('dashboard.addbioskop', compact('bioskops'));
	}
	public function Addbioskop(Request $req){
		$data = [
            'id' => $req->id,
            'nama_bioskop' => $req->nama_bioskop,
            'alamat' => $req->alamat,
			'harga' => $req->harga,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
		bioskop::insert($data);
		return redirect()->route('admin.dashboard.bioskop');
	}
	public function Editbioskop($id){
        $bioskops = bioskop::find($id);
        return view('dashboard.editbioskop', compact('bioskops'));
    }
	public function Updatebioskop(Request $req, $id){
        $data = [
            'id' => $req->id,
            'nama_bioskop' => $req->nama_bioskop,
            'alamat' => $req->alamat,
			'harga' => $req->harga,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        bioskop::where('id', $id)->update($data);
        return redirect()->route('admin.dashboard.bioskop');
    }
	public function Destroybioskop($id){
        Pegawai::where('id','=', $id)->delete();
        return redirect()->route('admin.dashboard.bioskop');
    }
    public function AddKabupaten(Request $req){

    }

    public function AddProvinsi(Request $req){

    }
}
