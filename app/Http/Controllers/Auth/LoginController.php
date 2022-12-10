<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        matchSessionAppLocale();
    }

        public function showLoginForm()
    {
        if(\Auth::check())
            return redirect()->route('admin.dashboard');
        return view('auth.login');
    }


    protected function credentials(Request $request){
    	if(is_numeric($request->get('email'))){
        	return ['mobile'=>$request->get('email'),'password'=>$request->get('password')];
    	}
    	return ['email' => $request->get('email'), 'password'=>$request->get('password')];
    }

    protected function login(Request $request){
        $this->validateLogin($request);
        if (Auth::guard('web')->attempt($this->credentials($request), $request->filled('remember'))) {
            return redirect()->intended($this->redirectTo);
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('login');
    }

}
