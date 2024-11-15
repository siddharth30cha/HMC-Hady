<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Auth;
use Session;

class LoginController extends Controller {
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    protected function login (Request $request) {
        $data = $request->all();
        $credentials = $request->validate([
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user()->role;
            switch ($user) {
                case 1:
                    return redirect('/superadmin/dashboard');
                    break;

                case 2:
                    return redirect('/admin/dashboard');
                    break;
                
                default:
                    Auth::logout();
                    return redirect('/login');
                    break;
            }
        } else {
            return redirect('/login');
        }
    }
}
