<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Slide;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['testimonials']  = Testimonial::all()->where('status', 1);

        $data['services']  = Service::all()->where('status', 1);

        $data['teams']  = Team::all()->where('status', 1);

        $data['slides']  = Slide::all()->where('status', 1);

        return view('frontend.home', $data);
    }
}
