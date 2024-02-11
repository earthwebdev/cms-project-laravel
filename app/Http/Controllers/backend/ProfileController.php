<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function dashboard(){
        $users = User::count();
        $services = Service::count();
        $testimonials = Testimonial::count();
        $pages = Page::count();

        return view('backend.pages.dashboard', ['users' => $users , 'services' => $services, 'testimonials' => $testimonials, 'pages' => $pages]);
    }

    public function logout(){
        auth()->logout();
        session()->flash('success', 'You have successfully logout.');
        return redirect()->route('backend.login');
    }
}
