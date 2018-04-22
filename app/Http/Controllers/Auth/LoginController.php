<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    
    public function username()
    {
        return 'name';
    }
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {        
        $this->validate($request, [
        'username' => 'required|max:255',
        'password' => 'required',
    ]);
        
        
        
       // $user = new User;
       // $users=$user->all();

        
            if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
                
            return redirect()->intended('/');
        }            
                

    return $this->create($request);

         
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create($request)
    {
        $this->validate($request, [
        'username' => 'required|unique:users|max:255',
        'password' => 'required',
    ]);
        
         $user=User::create([
            'username' => $request->input('username'),            
            'password' => Hash::make($request->input('password')),
        ]);
         Auth::login($user);
         return redirect()->intended('/');
    }
    public function logout(){
     
Auth::logout();
  return redirect('/');
    }
}