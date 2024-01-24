@extends('backend.layout.master')

@section('title', 'Slides Create')

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
                    <h1 class="m-0">Slides</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backend.slides.index') }}">Slides</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title">Create Slides</h3>

                    </div>

                    <div>
                        <form role="form" action="{{ route('backend.slides.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">
                                    @if($errors->first('title'))
                                        <span style="color: red">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" placeholder="Enter description" name="description">
                                        {{ old('description') }}
                                    </textarea>
                                    @if($errors->first('description'))
                                        <span style="color: red">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                                {{-- <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input type="file" class="form-control" id="banner" placeholder="Enter banner image" name="banner">
                                    @if($errors->first('banner'))
                                        <span style="color: red">{{ $errors->first('banner') }}</span>
                                    @endif
                                </div> --}}

                                <div class="form-group">
                                    <label for="button_name">Button Title</label>
                                    <input type="text" class="form-control" id="button_name" placeholder="Enter button title" name="button_name" value="{{ old('button_name') }}">
                                    @if($errors->first('button_name'))
                                        <span style="color: red">{{ $errors->first('button_name') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="links">Links</label>
                                    <input type="text" class="form-control" id="links" placeholder="Enter links" name="links" value="{{ old('links') }}">
                                    @if($errors->first('links'))
                                        <span style="color: red">{{ $errors->first('links') }}</span>
                                    @endif
                                </div>

                                

                                <div class="form-group">
                                    <label for="isadmin">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option selected value="">Select Status</option>
                                        <option value="2" {{ old('status') == 2?'selected':'' }}>Inactive</option>
                                        <option value="1" {{ old('status') == 1?'selected':'' }}>Active</option>
                                    </select>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="number" class="form-control" id="name" placeholder="Phone" name="mobile" value="">
                                    @if($errors->first('mobile'))
                                        <span style="color: red">{{ $errors->first('mobile') }}</span>
                                    @endif


                                </div>
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control" id="name" placeholder="Username" name="username" value="">
                                    @if($errors->first('username'))
                                        <span style="color: red">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Address</label>
                                    <input type="text" class="form-control" id="name" placeholder="Address" name="address" value="">
                                    @if($errors->first('address'))
                                        <span style="color: red">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Designation</label>
                                    <input type="text" class="form-control" id="name" placeholder="Designation" name="designation" value="">
                                    @if($errors->first('designation'))
                                        <span style="color: red">{{ $errors->first('designation') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Status</label>
                                   <select name="status" class="form-control">
                                       <option value="active">Active</option>
                                       <option value="inactive">In-Active</option>
                                   </select>
                                    @if($errors->first('status'))
                                        <span style="color: red">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">profile</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="profile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>


        </div>
    </section>
    <!-- /.content -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
     ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } ); 
    </script>
            
@endsection
