<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = 'admin.dashboard';


    protected function guard(){
        return Auth::guard('web_admins');

    }



    public function registerAdmin()
    {
        //
        return view('auth.adminregister');
    }

    public function HomeDashboard(){
        return view('dashboard.home');
    }

    protected function login(Request $request){
        $this->validate($request,[
            'email'=> 'required|string',
            'password' => 'required|string',

        ]);

        if($this->guard()->attempt(['email' =>$request->email, 'password' =>$request->password], $request->filled('remember'))) {
            $pemilik = $this->guard()->user()->id;
            return redirect()->route('admin.dashboard');
        }
        return $this->sendFailedLoginResponse($request);



    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function loginPage(){
        if ($this->guard()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.adminlogin');
    }

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
    public function register(Request $request){
        $this->validator($request->all())->validate();
        $pemilik = $this->create($request->all());
        $this->guard()->login($pemilik);
        return redirect($this->redirectTo);



    }

    /* Fungsi validator(array $data) merupakan fungsi
    untuk melakukan validasi pada tiap data pemilik
    kendaraan yang ada,tergantung dari data tersebut

    */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:admins',
            'password' => 'required|string|min:6|confirmed',


        ]);
    }

    protected function create(array $data)
    {
        // dd($data);
        return admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestu
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
