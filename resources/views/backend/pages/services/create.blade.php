@extends('backend.layout.master')

@section('title', 'Services Create')

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
                    <h1 class="m-0">Services</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backend.services.index') }}">Services</a></li>
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
                        <h3 class="card-title">Create Services</h3>

                    </div>

                    <div>
                        <form role="form" action="{{ route('backend.services.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="name">Short Description</label>
                                    <input type="text" class="form-control" id="excerpt" placeholder="Enter short description" name="excerpt" value="{{ old('excerpt') }}">
                                    @if($errors->first('excerpt'))
                                        <span style="color: red">{{ $errors->first('excerpt') }}</span>
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

                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" placeholder="Enter photo" name="photo">
                                    @if($errors->first('photo'))
                                        <span style="color: red">{{ $errors->first('photo') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="isadmin">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option selected value="">Select Status</option>
                                        <option value="2" {{ old('status') == 2?'selected':'' }}>Inactive</option>
                                        <option value="1" {{ old('status') == 1?'selected':'' }}>Active</option>
                                    </select>
                                    @if($errors->first('status'))
                                        <span style="color: red">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
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
