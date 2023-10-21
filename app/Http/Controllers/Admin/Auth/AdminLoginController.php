<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HomeAdmin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(){
        return view('admin.auth.login');
    }

    public function check(Request $request){

        $this->validate($request,[
            'email'=>['required','email'],
            'password'=>['required','min:6']
        ]);

         if(Auth::guard('admin')->attempt($request->only(['email','password'])))
            return redirect(RouteServiceProvider::HomeAdmin);

         return redirect()->route('admins.login')->withInput($request->only('email', 'remember'))->withErrors([
             'errors' => "L'email ou le mot de passe est incorrect"]);

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admins.login');
    }


}
