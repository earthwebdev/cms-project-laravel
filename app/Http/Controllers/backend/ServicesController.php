<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['services'] = Service::paginate(5);
        return view('backend.pages.services.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.services.create' );
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
            'excerpt' => 'required|min:10',
            'description'   => 'required|min:10',
            'photo'        => 'required|mimes:png,jpg,gif',
            'status'        => 'required'
        ]);

        $photoname = '';
        if( $request->has('photo') && $request->file('photo') ){
            $photo = $request->file('photo');
            $filename = time().'_'. rand(9999, 99999999).'_'.$photo->getClientOriginalName();

            $photo_path = public_path('/uploads/services/');
            //dd($photo_path);
            $photo->move($photo_path, $filename);
            $photoname = $filename;
            //dd($photoname . ' -- ' .$filename);
        }

        $dataservice = [
            'title' => $validated['title'],
            'excerpt'   => $validated['excerpt'],
            'description'   => $validated['description'],
            'photo'        => $photoname,
            'status'        => $validated['status'],
            'created_at'    => Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ];

        $dataservicecreated = Service::insert($dataservice);
        if($dataservicecreated){
            $request->session()->flash('success', 'Service created successfully.');
            return redirect()->route('backend.services.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        if(!$service){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.services.index');
        }
        return view('backend.pages.services.edit', ['service' => $service] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if(!$service){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.service.index');
        }

        $validated = $request->validate([
            'title' => 'required|min:4',
            'excerpt' => 'required|min:10',
            'description'   => 'required|min:10',
            'photo'        => 'mimes:png,jpg,gif',
            'status'        => 'required'
        ]);

        $photoname = $service->photo;
        if( $request->has('photo') && $request->file('photo') ){
            $photo = $request->file('photo');
            $filename = time().'_'. rand(9999, 99999999).'_'.$photo->getClientOriginalName();

            $photo_path = public_path('/uploads/services/');
            //dd($photo_path);
            $photo->move($photo_path, $filename);
            $photoname = $filename;
            //dd($photoname . ' -- ' .$filename);
            if (File::exists(public_path('uploads/services/'.$service->photo))) {
                File::delete(public_path('uploads/services/'.$service->photo));
            }
        }

        $dataservice = [
            'title' => $validated['title'],
            'excerpt'   => $validated['excerpt'],
            'description'   => $validated['description'],
            'photo'        => $photoname,
            'status'        => $validated['status'],
            'created_at'    => Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ];

        $dataserviceupdated = $service->update($dataservice);
        if($dataserviceupdated){
            $request->session()->flash('success', 'Service updated successfully.');
            return redirect()->route('backend.services.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if(!$service){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.service.index');
        }

        if (File::exists(public_path('uploads/services/'.$service->photo))) {
            File::delete(public_path('uploads/services/'.$service->photo));
        }

        $service->delete();
        session()->flash('success', 'Service deleted successfully.');
            return redirect()->route('backend.services.index');
    }
}
