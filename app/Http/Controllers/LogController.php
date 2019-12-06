<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use Auth;


class LogController extends Controller
{    
 
    public function __construct()
    {
        $this->middleware('guest:owner')->except('logout');
    }

    public function showform(){
        return view('owner.rest-login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

    
    if(Auth::guard('owner')->attempt(['email'=>$request->email ,'password'=>$request->password ], $request->remember))
    {
        return redirect()->intended('owner');
    }


    // return redirect()->back()->withInput($request->only('email','remember'));
    return $this->sendFailedLoginResponse($request);


    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function username(){
        return 'email';
    }

}
