<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\jadwal_film;
use DateTime;
use App\kursi;
use App\transaksi;
use Carbon\carbon;
use App\detail_transaksi;
use DB;
class JadwalController extends Controller
{
    //



    public function showJadwal($id,$bioskop_param){
        $now = new DateTime();
        $jadwal = jadwal_film::where('id_film',$id)
                ->where('tanggal_tayang','>=',$now)
                ->get();

        return response()->json($jadwal,200);

    }

    public function bookingKursi(){

    }

    public function showKursiStatus($jadwal_film){

                // ->where('t')

        $kursi_available = DB::table('kursi_lists')->join('kursis','kursi_lists.id_kursi','=','kursis.id')
                            ->join('jadwal_films','kursi_lists.id_jadwal','=','jadwal_films.id')
                            ->where('jadwal-films.id','=',$jadwal_film)
                            ->select('kursi.kode_kursi','status_kursi')
                            ->get();

        return response()->json($kursi_available,200);
    }


    public function bookKursi(Request $req,$id_jadwal){

        $transaksi = new transaksi;

        $transaksi->tanggal_transaksi = carbon::now();
        $transaksi->tanggal_batas_pembayaran = carbon::now()->addDays(1);
        $transaksi->status_pembayaran = 'menunggu';
        $transaksi->id_user = $this->getCredentialId();
        $transaksi->id_jadwal = $id_jadwal;
        $transaksi->bukti_pembayaran = Null;
        $transaksi->tanggal_pembayaran = Null;
        $transaksi->save();


        $kursis = $req->input('kursis');

        $detail = []; // nampung kursi di transaksi
        foreach($req->nama_array as $value){

            $detail[]=[
                'id_kursi' =>  $value,
                'status_kursi' => 1,
                'id_transaksi' => $transaksi->id


            ];
        }

        DB::table('detail_transaksis')->insert($detail);


        return response()->json(['msg'=>'sukses'],200);

    }



    public function updatePembayaran(transaksi $transaksi){
        $transaksi->status_pembayaran = 'sedang_proses';
        $bukti_transaksi = time().$request->bukti_trans->getClientOriginalName();
        $request->bukti_trans->storeAs('public',$bukti_transaksi);
        $transaksi->bukti_pembayaran =  $bukti_transaksi;
        $transaksi->tanggal_pembayaran = Carbon::now();
        $transaksi->save();
    }


    public function showListBioskop($id_film){
        $listBioskop = DB::table('bioskops')
        ->join('studios','bioskops.id','=','studios.id_bioskop')
        ->join('jadwal_films','studios.id','=','jadwal_films.id_studio')
        ->where('jadwal_films.id_film','=',$id_film)
        ->get();

        return response()->json($listBioskop,200);
    }


    public function listKursiPerJadwal(jadwal_film $jadwal){

        $listKursi = DB::table('kursi_lists')->where('id_jadwal','=',$jadwal->id);

        return $listKursi;
    }



    protected function getCredentialId(){

        $cred = auth('api')->user()->id;

    }


}
