<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Utils\SettingUtils;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logo = \App\Utils\SettingUtils::get('logo');
        $home_about_image = \App\Utils\SettingUtils::get('home_about_image');
        $header_image = \App\Utils\SettingUtils::get('header_image');
        
        //dd($request);
        $validated = $request->validate([
            'company_name'      => 'required',
            'logo'              =>  $logo? 'mimes:png,jpg,gif': 'required|mimes:png,jpg,gif',
            'company'           => 'required',
            'location'          => 'required',
            'phone'             => 'required',
            'email'             => 'required|email',
            'facebook'          => 'required|url',
            'twitter'           => 'required|url',
            'linkedin'          => 'required|url',
            'instagram'         => 'required|url',   
            'header_image'      => $header_image?'mimes:png,jpg,gif': 'required|mimes:png,jpg,gif',
            'home_service'      => 'required',
            'home_about'        => 'required', 
            'home_team'         => 'required',            
            'footer_company'    => 'required',
            'footer_service'    => 'required',
            'home_about_image'  => $home_about_image?'mimes:png,jpg,gif': 'required|mimes:png,jpg,gif',
            'copyright'         => 'required'
        ]);
        $logo_name = $logo?$logo: '';
        if($request->has('logo') && $request->file('logo')){
            $file = $request->file('logo');
            $filename = time().'_'. rand(9999, 999999).'_' . $file->getClientOriginalName();
            $logo_path = public_path('uploads/settings/');
            $file->move($logo_path, $filename);
            $logo_name = $filename;
        }

        $headerimage_name = $header_image?$header_image: '';
        if($request->has('header_image') && $request->file('header_image')){
            $file_headerimage = $request->file('header_image');
            $filename_headerimage = time().'_'. rand(9999, 999999).'_' . $file_headerimage->getClientOriginalName();
            $homeheaderimage_path = public_path('uploads/settings/');
            $file_headerimage->move($homeheaderimage_path, $filename_headerimage);
            $headerimage_name = $filename_headerimage;
        }

        $homeaboutimage_name = $home_about_image?$home_about_image: '';
        if($request->has('home_about_image') && $request->file('home_about_image')){
            $file_about = $request->file('home_about_image');
            $filename_about = time().'_'. rand(9999, 999999).'_' . $file_about->getClientOriginalName();
            $homeabout_path = public_path('uploads/settings/');
            $file_about->move($homeabout_path, $filename_about);
            $homeaboutimage_name = $filename_about;
        }

        $dataCheck = false;

        $dataCheck = SettingUtils::set('company_name', $request->company_name);
        $dataCheck = SettingUtils::set('company', $request->company);
        $dataCheck = SettingUtils::set('logo', $logo_name);
        $dataCheck = SettingUtils::set('location', $request->location);
        $dataCheck = SettingUtils::set('location', $request->location);
        $dataCheck = SettingUtils::set('phone', $request->phone);
        $dataCheck = SettingUtils::set('email', $request->email);
        $dataCheck = SettingUtils::set('facebook', $request->facebook);
        $dataCheck = SettingUtils::set('twitter', $request->twitter);
        $dataCheck = SettingUtils::set('linkedin', $request->linkedin);
        $dataCheck = SettingUtils::set('instagram', $request->instagram);

        $dataCheck = SettingUtils::set('header_image', $headerimage_name);
        $dataCheck = SettingUtils::set('home_about_image', $homeaboutimage_name);        

        $dataCheck = SettingUtils::set('home_service', $request->home_service);
        $dataCheck = SettingUtils::set('home_about', $request->home_about);
        $dataCheck = SettingUtils::set('home_team', $request->home_team);
        $dataCheck = SettingUtils::set('footer_company', $request->footer_company);
        $dataCheck = SettingUtils::set('footer_service', $request->footer_service);
        $dataCheck = SettingUtils::set('copyright', $request->copyright);

        if($dataCheck){
            $request->session()->flash('success', 'Setting updated successfully.');
            return redirect()->route('backend.settings.index');
        }   


        session()->flash('error', 'Please correct the validation errors.');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
