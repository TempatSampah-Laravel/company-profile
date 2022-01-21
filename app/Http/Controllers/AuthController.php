<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    } 
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('admin-panel')->with(['success' => 'Login Success']);
        }

        return back()->with(['error' => 'Login Failed, Please try again!!!']);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login')->with(['success' => 'Logout Success']);
    }
}
