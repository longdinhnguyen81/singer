<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.auth.login');
    }
    public function postLogin(Request $request){
        $username = trim($request->username);
        $password = trim($request->password);
        if(Auth::attempt(['username' => $username, 'password' => $password])){
            $value = $request->session()->put('username', $username);
            return redirect()->route('admin.index.index');
        } else{
            return redirect()->route('auth.auth.login')->with('msg','Sai username hoặc password');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('auth.auth.login');
    }
}
