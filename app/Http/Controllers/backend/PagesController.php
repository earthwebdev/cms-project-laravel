<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::paginate(5);
        return view('backend.pages.main.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.main.create' );
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
            'title' => 'required|min:4',
            'description'   => 'required|min:10',
            'image'        => 'required|mimes:png,jpg,gif',
            'status'        => 'required'
        ]);

        $imagename = '';
        if( $request->has('image') && $request->file('image') ){
            $image = $request->file('image');
            $filename = time().'_'. rand(9999, 99999999).'_'.$image->getClientOriginalName();

            $image_path = public_path('/uploads/pages/');
            //dd($image_path);
            $image->move($image_path, $filename);
            $imagename = $filename;
            //dd($imagename . ' -- ' .$filename);
        }

        $datapage = [
            'title' => $validated['title'],
            'slug'  => Str::slug($request->title),
            'description'   => $validated['description'],
            'image'        => $imagename,
            'status'        => $validated['status'],
            'created_at'    => Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ];

        $datapagecreated = Page::insert($datapage);
        if($datapagecreated){
            $request->session()->flash('success', 'Page created successfully.');
            return redirect()->route('backend.pages.index');
        }
        $request->session()->flash('error', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(!$page){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.pages.index');
        }
        return view('backend.pages.main.edit', ['page' => $page] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        if(!$page){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.pages.index');
        }
        $imagename = $page->image;

        $validated = $request->validate([
            'title'         => 'required|min:4',
            'description'   => 'required|min:10',
            'image'         => $imagename ? 'mimes:png,jpg,gif': 'required|mimes:png,jpg,gif',
            'status'        => 'required'
        ]);

        if( $request->has('image') && $request->file('image') ){
            $image = $request->file('image');
            $filename = time().'_'. rand(9999, 99999999).'_'.$image->getClientOriginalName();

            $image_path = public_path('/uploads/pages/');
            //dd($image_path);
            $image->move($image_path, $filename);
            $imagename = $filename;
            //dd($imagename . ' -- ' .$filename);
            if (File::exists(public_path('uploads/pages/'.$page->photo))) {
                File::delete(public_path('uploads/pages/'.$page->photo));
            }
        }

        $datapage = [
            'title' => $validated['title'],
            'slug'  => Str::slug($validated['title']),
            'description'   => $validated['description'],
            'image'        => $imagename,
            'status'        => $validated['status'],
            'updated_at'    =>  Carbon::now()
        ];
//dd($datapage);
        $datapageupdate= $page->update($datapage);
        if($datapageupdate){
            $request->session()->flash('success', 'Page created successfully.');
            return redirect()->route('backend.pages.index');
        }
        $request->session()->flash('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(!$page){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.pages.index');
        }

        if (File::exists(public_path('uploads/pages/'.$page->photo))) {
            File::delete(public_path('uploads/pages/'.$page->photo));
        }

        $page->delete();
        session()->flash('success', 'Page deleted successfully.');
            return redirect()->route('backend.pages.index');
    }
}
