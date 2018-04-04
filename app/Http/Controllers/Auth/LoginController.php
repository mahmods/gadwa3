<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        if(auth()->user()->role_id ==1)
        {
            return redirect()->route('getBackendHome');
        }
        return redirect()->route('getHome');
    }
    public function customRegister(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role_id=2;
        $user->password=bycrpt($request->password);
        $user->save();
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect()->route('getHome');
        }
    }
    public function showLoginForm()
    {
        return view('front.auth.login');
    }
}
