<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['slides'] = Slide::paginate(5);
        return view('backend.pages.slides.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.slides.create' );
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
            'title' => 'required|min:5',
            'description'   => 'required|min:10',
            'links'         => 'required|url',
            'button_name'   => 'required',
            'status'        => 'required'
            //'banner'        => 'required|mimes:png,jpg,gif'
        ]);

        /* $bannername = '';
        if( $request->has('banner') && $request->file('banner') ){
            $banner = $request->file('banner');
            $filename = time().'_'. rand(9999, 99999999).'_'.$banner->getClientOriginalName();

            $banner_path = public_path('/uploads/banners/');
            //dd($banner_path);
            $banner->move($banner_path, $filename);
            $bannername = $filename;
            //dd($bannername . ' -- ' .$filename);
        } */

        $dataslide = [
            'title' => $validated['title'],
            'description'   => $validated['description'],
            'links'         => $validated['links'],
            'button_name'   => $validated['button_name'],
            //'banner'        => $bannername,
            'status'        => $validated['status'],
            'created_at'    => Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ];

        $dataslide = Slide::insert($dataslide);
        if($dataslide){
            $request->session()->flash('success', 'Slide created successfully.');
            return redirect()->route('backend.slides.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        if(!$slide){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.slides.index');
        }
        return view('backend.pages.slides.edit', ['slide' => $slide] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        if(!$slide){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.slides.index');
        }

        $validated = $request->validate([
            'title' => 'required|min:5',
            'description'   => 'required|min:10',
            'links'         => 'required|url',
            'button_name'   => 'required',
            'status'        => 'required'
            //'banner'        => 'mimes:png,jpg,gif'
        ]);

        /* $bannername = $slide->banner;
        if( $request->has('banner') && $request->file('banner') ){
            $banner = $request->file('banner');
            $filename = time().'_'. rand(9999, 99999999).'_'.$banner->getClientOriginalName();
            $banner_path = public_path('/uploads/banners/');
            $banner->move($banner_path, $filename);
            $bannername = $filename;

            if (File::exists(public_path('uploads/banners/'.$slide->banner))) {
                File::delete(public_path('uploads/banners/'.$slide->banner));
            }
        } */

        $dataslide = [
            'title' => $validated['title'],
            'description'   => $validated['description'],
            'links'         => $validated['links'],
            'button_name'   => $validated['button_name'],
            'status'        => $validated['status'],
            //'banner'        => $bannername,
            'created_at'    => Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ];
//dd($dataslide);
        $dataslide = $slide->update($dataslide);
        if($dataslide){
            $request->session()->flash('success', 'Slide updated successfully.');
            return redirect()->route('backend.slides.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        if(!$slide){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.slides.index');
        }
        if (File::exists(public_path('uploads/banners/'.$slide->banner))) {
            File::delete(public_path('uploads/banners/'.$slide->banner));
        }

        $slide->delete();
        session()->flash('success', 'Slide deleted successfully.');
            return redirect()->route('backend.slides.index');
    }
}
