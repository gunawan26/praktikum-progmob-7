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
            return response()->json(['status'=> false,
                                    'error' => 'Unauthorized'], 401);
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
            'status'    => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    //Registering the User

    public function register(Request $request){

        try{
            $this->validator($request->all())->validate();
            // if ($this->validator->fails()) {    
            //     return response()->json($validator->messages(), 400);
            // }
            $usr = $this->create($request->all());
            return response()->json([
                'status'    =>true,
                'msg'       =>'registered',
                'email'     =>$usr->email,
                'name'      =>$usr->name

            ],200);
        }catch(Illuminate\Database\QueryException $e){
            return response()->json([
    			'status'	=> false,
    			'msg'		=> 'Error inserting data.'
    		], 400);
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'jenis_kelamin' =>['in:laki,perempuan'],
            'tanggal_lahir'=>['date'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
        ]);
    }





}
