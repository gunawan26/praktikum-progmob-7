<?php

namespace App\Http\Controllers\api;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Wishlist;
use App\Film;
use Illuminate\Support\Facades\Validator;



class HomeController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth:api');


    }

    public function filmSedangTayang(){

        $date_now=date('Y-m-d');
        $sedang_tayang = DB::table('films')->where('tgl_mulai','<=',$date_now)
                                            ->where('tanggal_selesai','>=',$date_now)
                                            ->simplePaginate(5);


        return response()->json([
            'status'=> true,
            'tanggal_sekarang'=> $date_now,
            'val' => $sedang_tayang,
            'user'=>$cred
        ]);
    }


    public function filmAkanTayang(){
        $date_now=date('Y-m-d');
        $akan_tayang = DB::table('films')->where('tgl_mulai','>=',$date_now)
                                        ->simplePaginate(5);

        return response()->json([
            'status'=> true,
            'tanggal_sekarang'=> $date_now,
            'val' => $akan_tayang
        ]);
    }

    public function addWishList(Request $request){
        $wishlist = new Wishlist;

        $id_user_loggin = $this->getCredentialId();

        try{
            $validator = Validator::make($request->all(), [
                'id' => ['required','integer'],
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>true,
                    'error'=>true,
                    'message'=>$validator->messages()
                ],200);
            }

            $film_selected = film::findOrFail($request->id);
            $wishlist->id_user =  $id_user_loggin;
            $wishlist->id_film = $request->id;
            $wishlist->save();

            return response()->json([

                'status'=>true,
                'msg'=>'ditambahkan'
            ],200);

        }catch(Illuminate\Database\QueryException $e){
            return response()->json([

                'status'=>false,
                'msg'=>'gagal menambahkan wishlist'
            ],400);
        }

    }

    public function deleteWishList($id){

        try{
           # $user_verification = W

            Wishlist::destroy($id);

            return response()->json([

                'status'=>true,
                'msg'=>'berhasil dihapus'
            ],200);

        }catch(Illuminate\Database\QueryException $e){
            return response()->json([

                'status'=>false,
                'msg'=>'gagal menghapus wishlist'
            ],400);

        }





    }

    protected function getCredentialId(){
        $cred = auth('api')->user()->id;
        return $cred;
    }







}
