<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Photo;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }





    public function create()
    {
        return View('auth.login');
    }

    public function login()
    {

      if(! auth()->attempt(\request(['email','password'])) )
        {
            return back()->withErrors([
                'message'=> 'اسم المستخدم أو كلمة المرور خطأ'
            ]);
        }

     return redirect()->home();
    }

    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
}
