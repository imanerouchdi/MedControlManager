<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
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

    // use AuthenticatesUsers;
    use AuthTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function loginForm($type){
        return view ('auth.login',compact('type'));
    }
    public function login(Request $request){
        
        // if( Auth::guard($this->chekGuard)->attempt(['email'=>$request->email,'password'=>$request->password]))
        // {
        //     $this->redirect($request);
        // }
        



        //// new auth

        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if (auth()->user()->type=='admin') {
            return redirect()->route('admin.home');
                
            }
            elseif (auth()->user()->type=='assistant') {
                return redirect()->route('assistant.home');
                    
            }
            else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
            ->with('error','Email adres and password not correct .');
        }




    }
}
