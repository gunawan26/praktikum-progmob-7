<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use Auth;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {

            return response()->json([
                'status'        => false,
                'msg'           => 'gagal login',
                'access_token'  => null,
                'error'         => 'password atau username salah',
            ],401);

        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
         return response()->json(['message' => 'Successfully logged out']);

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {

        return response()->json([
            'status'        => true,
            'msg'           => 'berhasil login',
            'access_token'  => $token,
            'error'         => null,
        ],200);


         return $res;


    }

    //Registering the User

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'tanggal_lahir' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status'        => false,
                'msg'           => 'input salah',
                'access_token'  => null,
                'error'         => $validator->messages(),
            ],400);
        }


        try{
            $usr = $this->create($request->all());
            $login_respon = $this->login();

            return $login_respon->original;
        }catch(Illuminate\Database\QueryException $e){

            return response()->json([
                'status'        => false,
                'msg'           => 'error insert data',
                'access_token'  => null,
                'error'         =>'Error !!!',
            ],400);
        }


    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tanggal_lahir' => $data['tanggal_lahir'],

        ]);
    }

}
