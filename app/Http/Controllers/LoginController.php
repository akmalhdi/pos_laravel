<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function actionLogin(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        // kalo login gagal
        alert()->warning('WRONG', 'LOL');
        return back()->withInput($request->only('email'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }
}
