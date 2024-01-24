<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $validation = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 1
        ]);

        if($validation){
            return redirect()->route('backend.dashboard')->with('success', 'Login successfully.');
        }else{
            $request->session()->flash('error', 'Invalid credentials.');
            return redirect()->back();
        }
    }
}
