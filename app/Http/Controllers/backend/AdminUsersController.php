<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth()->user()->id);
        $data['users'] = User::where('id', '!=', Auth()->user()->id)->paginate(1);
        return view('backend.pages.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.users.create');
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
            'name'      => 'required|min:4',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',//|confirmed
            'password_confirmation' => 'required|min:6|same:password'
        ]);

        $userData = [
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>bcrypt($request->password),
            'is_admin' =>$request->isadmin ?1:0,
        ];

        $user = User::insert($userData);
        if($user){
            $request->session()->flash('success', 'User created successfully.');
            return redirect()->route('backend.users.index');
        }

        $request->session()->flash('error', 'User does not created successfully.');
        return redirect()->back()->withInput();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.users.index');
        }

        $data['user'] = User::find($id);
        return view('backend.pages.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$id){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.users.index');
        }

        $user = User::find($id);

        if($user)
        {
            $validated = $request->validate([
                'name'      => 'required|min:4',
                'email'     => [
                    'required',
                    'email',
                    'unique:users,email,'.$user->id
                ],
                //'required|email|unique:users,email,'.$user->id,
                //'password'  => 'confirmed',
                'password_confirmation' => 'same:password'
            ]);

            $userData = [
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>$request->password?bcrypt($request->password):$user->password,
                'is_admin' =>$request->isadmin,
            ];
            //dd($userData);

            $user_update = $user->update($userData);
            if($user_update){
                $request->session()->flash('success', 'User updated successfully.');
                return redirect()->route('backend.users.index');
            }
        }

        $request->session()->flash('error', 'User does not created successfully.');
        //return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$id){
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('backend.users.index');
        }
        $user = User::find($id);
        if(!$user){
            session()->flash('error', 'Users not found');
            return redirect()->route('backend.users.index');
        }

        $user->delete();
        session()->flash('error', 'User delete successfully');
        return redirect()->route('backend.users.index');
    }
}
