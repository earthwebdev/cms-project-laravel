<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teams'] = Team::paginate(5);
        return view('backend.pages.teams.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.teams.create' );
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
            'name' => 'required|min:4',
            'designation'   => 'required|min:4',
            'photo'        => 'required|mimes:png,jpg,gif',
            'status'        => 'required'
        ]);

        $photoname = '';
        if( $request->has('photo') && $request->file('photo') ){
            $photo = $request->file('photo');
            $filename = time().'_'. rand(9999, 99999999).'_'.$photo->getClientOriginalName();

            $photo_path = public_path('/uploads/teams/');
            //dd($photo_path);
            $photo->move($photo_path, $filename);
            $photoname = $filename;
            //dd($photoname . ' -- ' .$filename);
        }

        $datateam = [
            'name' => $validated['name'],
            'designation'   => $validated['designation'],
            'photo'        => $photoname,
            'status'        => (int)$request->status,
            'created_at'    => Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ];

        $datacreateteam = Team::insert($datateam);
        if($datacreateteam){
            $request->session()->flash('success', 'Team created successfully.');
            return redirect()->route('backend.teams.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        if(!$team){
            session()->flash('error', 'Something went wrong');
            redirect()->route('backend.teams.index');
        }

        return view('backend.pages.teams.edit', ['team' => $team] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        if(!$team){
            session()->flash('error', 'Something went wrong');
            redirect()->route('backend.teams.index');
        }

        $validated = $request->validate([
            'name' => 'required|min:4',
            'designation'   => 'required|min:4',
            'photo'        => 'mimes:png,jpg,gif',
            'status'        => 'required'
        ]);

        $photoname = $team->photo;
        if( $request->has('photo') && $request->file('photo') ){
            $photo = $request->file('photo');
            $filename = time().'_'. rand(9999, 99999999).'_'.$photo->getClientOriginalName();

            $photo_path = public_path('/uploads/teams/');
            //dd($photo_path);
            $photo->move($photo_path, $filename);
            $photoname = $filename;
            //dd($photoname . ' -- ' .$filename);
        }

        $datateam = [
            'name' => $validated['name'],
            'designation'   => $validated['designation'],
            'photo'        => $photoname,
            'status'        => (int)$request->status,
            'updated_at'    =>  Carbon::now()
        ];

        $dataupdateteam = $team->update($datateam);
        if($dataupdateteam){
            $request->session()->flash('success', 'Team updated successfully.');
            return redirect()->route('backend.teams.index');
        }
        $request->session()->flash('success', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if(!$team){
            session()->flash('error', 'Something went wrong');
            redirect()->route('backend.teams.index');
        }

        if (File::exists(public_path('uploads/teams/'.$team->photo))) {
            File::delete(public_path('uploads/teams/'.$team->photo));
        }

        $team->delete();
        session()->flash('success', 'Team deleted successfully.');
            return redirect()->route('backend.teams.index');
    }
}
