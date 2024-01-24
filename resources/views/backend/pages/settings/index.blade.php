@extends('backend.layout.master')

@section('title' ,'System Settings' )

@section('content')
@if (session('error'))
<div class="text-danger text-center">{{ session('error') }}</div>
@endif
@if (session('success'))
<div class="text-danger text-center">{{ session('success') }}</div>
@endif
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">System Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">System Settings</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 card">
            <div class="card-header">
                <h3 class="card-title">System Settings</h3>

            </div>

            <div>
                <form role="form" action="{{ route('backend.settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" placeholder="Enter company name" name="company_name" value="{{ old('company_name')? old('company_name'): \App\Utils\SettingUtils::get('company_name') }}">
                            @if($errors->first('company_name'))
                                <span style="color: red">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="banner">Logo</label>
                            <input type="file" class="form-control" id="logo" placeholder="Enter logo" name="logo">
                            @if (\App\Utils\SettingUtils::get('logo'))
                                <a href="{{ asset('uploads/settings/'.\App\Utils\SettingUtils::get('logo')) }}"><img class="mt-2" width="300px" src="{{ asset("uploads/settings/".\App\Utils\SettingUtils::get('logo'))  }}" ></a>
                            @endif
                            @if($errors->first('logo'))
                                <span style="color: red">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="isadmin">Company Name / Logo</label>
                            <select name="company" class="form-control" id="company">
                                <option selected value="">Select company / Company Logo</option>
                                <option value="2" {{ old('company') == 2 || \App\Utils\SettingUtils::get('company') == 2 ?'selected':'' }}>Logo</option>
                                <option value="1" {{ old('company') == 1 || \App\Utils\SettingUtils::get('company') == 1?'selected':'' }}>Company Name</option>
                            </select>
                            @if($errors->first('company'))
                                <span style="color: red">{{ $errors->first('company') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter location" name="location" value="{{ old('location')?old('location'):\App\Utils\SettingUtils::get('location') }}">
                            @if($errors->first('location'))
                                <span style="color: red">{{ $errors->first('location') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="{{ old('phone')? old('phone'):\App\Utils\SettingUtils::get('phone') }}">
                            @if($errors->first('phone'))
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email')?old('email') : \App\Utils\SettingUtils::get('email') }}">
                            @if($errors->first('email'))
                                <span style="color: red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" placeholder="Enter facebook link" name="facebook" value="{{ old('facebook')? old('facebook'):\App\Utils\SettingUtils::get('facebook') }}">
                            @if($errors->first('facebook'))
                                <span style="color: red">{{ $errors->first('facebook') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" id="twitter" placeholder="Enter twitter link" name="twitter" value="{{ old('twitter')?old('twitter'):\App\Utils\SettingUtils::get('twitter') }}">
                            @if($errors->first('twitter'))
                                <span style="color: red">{{ $errors->first('twitter') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" placeholder="Enter linkedin link" name="linkedin" value="{{ old('linkedin') ? old('linkedin'):\App\Utils\SettingUtils::get('linkedin') }}">
                            @if($errors->first('linkedin'))
                                <span style="color: red">{{ $errors->first('linkedin') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" id="instagram" placeholder="Enter instagram link" name="instagram" value="{{ old('instagram') ? old('instagram'):\App\Utils\SettingUtils::get('instagram') }}">
                            @if($errors->first('instagram'))
                                <span style="color: red">{{ $errors->first('instagram') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="header_image">Hero Image</label>
                            <input type="file" class="form-control" id="header_image" placeholder="Enter header image" name="header_image">
                            @if (\App\Utils\SettingUtils::get('header_image'))
                                <a href="{{ asset('uploads/settings/'.\App\Utils\SettingUtils::get('header_image')) }}"><img class="mt-2" width="300px" src="{{ asset("uploads/settings/".\App\Utils\SettingUtils::get('header_image'))  }}" ></a>
                            @endif
                            @if($errors->first('header_image'))
                                <span style="color: red">{{ $errors->first('header_image') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="home_service">Home Service Content</label>
                            <textarea class="form-control" id="home_service" name="home_service">
                                {{ old('home_service') ? old('home_service'):\App\Utils\SettingUtils::get('home_service') }}
                            </textarea>
                            {{-- <input type="text" class="form-control" id="home_service" placeholder="Enter home service content" name="home_service" value="{{ old('home_service') ? old('home_service'):\App\Utils\SettingUtils::get('home_service') }}"> --}}
                            @if($errors->first('home_service'))
                                <span style="color: red">{{ $errors->first('home_service') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="home_about">Home About Content</label>
                            <textarea class="form-control" id="tiny" name="home_about">
                                {{ old('home_about') ? old('home_about'):\App\Utils\SettingUtils::get('home_about') }}
                            </textarea>

                            @if($errors->first('home_about'))
                                <span style="color: red">{{ $errors->first('home_about') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="banner">Home About Image</label>
                            <input type="file" class="form-control" id="home_about_image" placeholder="Enter home about image" name="home_about_image">
                            @if (\App\Utils\SettingUtils::get('home_about_image'))
                                <a href="{{ asset('uploads/settings/'.\App\Utils\SettingUtils::get('home_about_image')) }}"><img class="mt-2" width="300px" src="{{ asset("uploads/settings/".\App\Utils\SettingUtils::get('home_about_image'))  }}" ></a>
                            @endif
                            @if($errors->first('home_about_image'))
                                <span style="color: red">{{ $errors->first('home_about_image') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="home_team">Home Team Content</label>
                            <textarea class="form-control" id="home_team" name="home_team">
                                {{ old('home_team') ? old('home_team'):\App\Utils\SettingUtils::get('home_team') }}
                            </textarea>
                            {{-- <input type="text" class="form-control" id="home_team" placeholder="Enter home service content" name="home_team" value="{{ old('home_team') ? old('home_team'):\App\Utils\SettingUtils::get('home_team') }}"> --}}
                            @if($errors->first('home_team'))
                                <span style="color: red">{{ $errors->first('home_team') }}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="instagram">Footer Company</label>
                            <textarea class="form-control" id="footer_company" name="footer_company">
                                {{ old('footer_company') ? old('footer_company'):\App\Utils\SettingUtils::get('footer_company') }}
                            </textarea>
                            {{-- <input type="text" class="form-control" id="footer_company" placeholder="Enter footer company" name="footer_company" value="{{ old('footer_company') ? old('footer_company'):\App\Utils\SettingUtils::get('footer_company') }}"> --}}
                            @if($errors->first('footer_company'))
                                <span style="color: red">{{ $errors->first('footer_company') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="instagram">Footer Service</label>
                            <textarea class="form-control" id="footer_service" name="footer_service">
                                {{ old('footer_service') ? old('footer_service'):\App\Utils\SettingUtils::get('footer_service') }}
                            </textarea>
                            {{-- <input type="text" class="form-control" id="footer_service" placeholder="Enter footer service" name="footer_service" value="{{ old('footer_service') ? old('footer_service'):\App\Utils\SettingUtils::get('footer_service') }}"> --}}
                            @if($errors->first('footer_service'))
                                <span style="color: red">{{ $errors->first('footer_service') }}</span>
                            @endif
                        </div>



                        <div class="form-group">
                            <label for="copyright">Footer Copyright</label>
                            <input type="text" class="form-control" id="copyright" placeholder="Enter footer copyright" name="copyright" value="{{ old('copyright')? old('copyright'): \App\Utils\SettingUtils::get('copyright') }}">
                            @if($errors->first('copyright'))
                                <span style="color: red">{{ $errors->first('copyright') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


</div>
</section>
<!-- /.content -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny',
            plugins: 'code',
            //toolbar: 'code',
            //menubar: 'tools'
        });
        tinymce.init({
            selector: 'textarea#home_team',
            plugins: 'code',
        });

        tinymce.init({
            selector: 'textarea#home_service',
            plugins: 'code',
        });

        tinymce.init({
            selector: 'textarea#footer_company',
            plugins: 'code',
        });

        tinymce.init({
            selector: 'textarea#footer_service',
            plugins: 'code',
        });

        // Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});
    </script>

<script>
/* ClassicEditor
    .create( document.querySelector( '#footer_company' ) )
    .catch( error => {
        console.error( error );
    } );
ClassicEditor
    .create( document.querySelector( '#footer_service' ) )
    .catch( error => {
        console.error( error );
    } );
ClassicEditor
    .create( document.querySelector( '#home_service' ) )
    .catch( error => {
        console.error( error );
    } );
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );*/
</script>
@endsection
