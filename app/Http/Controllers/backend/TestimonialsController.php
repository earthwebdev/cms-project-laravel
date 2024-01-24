<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['testimonials'] = Testimonial::paginate(5);
        return view('backend.pages.testimonials.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.testimonials.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description'   => 'required|min:10',
            'photo'        => 'required|mimes:png,jpg,gif'
        ]);

        $photoname = '';
        if( $request->has('photo') && $request->file('photo') ){
            $photo = $request->file('photo');
            $filename = time().'_'. rand(9999, 99999999).'_'.$photo->getClientOriginalName();

            $photo_path = public_path('/uploads/testimonials/');
            $photo->move($photo_path, $filename);
            $photoname = $filename;
            //dd($photoname . ' -- ' .$filename);
        }

        $datatestimonial = [
            'name' => $validated['name'],
            'description'   => $validated['description'],
            'photo'        => $photoname,
            'created_at'    => Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ];

        $updatedata = Testimonial::insert($datatestimonial);
        if($updatedata){
            $request->session()->flash('success', 'Testimonial created successfully.');
            return redirect()->route('backend.testimonials.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        if(!$testimonial){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.testimonials.index');
        }
        return view('backend.pages.testimonials.edit', ['testimonial' => $testimonial] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        if(!$testimonial){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.testimonials.index');
        }
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description'   => 'required|min:10',
            'photo'        => 'mimes:png,jpg,gif'
        ]);

        $photoname = $testimonial->photo;
        if( $request->has('photo') && $request->file('photo') ){
            $photo = $request->file('photo');
            $filename = time().'_'. rand(9999, 99999999).'_'.$photo->getClientOriginalName();

            $photo_path = public_path('/uploads/testimonials/');
            $photo->move($photo_path, $filename);
            $photoname = $filename;
            //dd($photoname . ' -- ' .$filename);
            if (File::exists(public_path('uploads/testimonials/'.$testimonial->photo))) {
                File::delete(public_path('uploads/testimonials/'.$testimonial->photo));
            }
        }

        $datatestimonial = [
            'name' => $validated['name'],
            'description'   => $validated['description'],
            'photo'        => $photoname,
            'updated_at'    =>  Carbon::now()
        ];

        $updatedata = $testimonial->update($datatestimonial);
        if($updatedata){
            $request->session()->flash('success', 'Testimonial updated successfully.');
            return redirect()->route('backend.testimonials.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if(!$testimonial){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.testimonials.index');
        }

        if (File::exists(public_path('uploads/testimonials/'.$testimonial->photo))) {
            File::delete(public_path('uploads/testimonials/'.$testimonial->photo));
        }

        $testimonial->delete();
        session()->flash('success', 'Testimonial deleted successfully.');
            return redirect()->route('backend.testimonials.index');
    }
}
