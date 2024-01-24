<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function dashboard(){
        return view('backend.pages.dashboard');
    }

    public function logout(){
        auth()->logout();
        session()->flash('success', 'You have successfully logout.');
        return redirect()->route('backend.login');
    }
}
