@extends('backend.layout.master')

@section('title', 'Teams Update')

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
                    <h1 class="m-0">Teams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backend.teams.index') }}">Teams</a></li>
                        <li class="breadcrumb-item active">Update</li>
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
                        <h3 class="card-title">Update Teams</h3>

                    </div>

                    <div>
                        <form role="form" action="{{ route('backend.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter title" name="name" value="{{ old('name')?old('name'):$team->name }}">
                                    @if($errors->first('name'))
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="designation" placeholder="Enter designation" name="designation" value="{{ old('designation')?old('designation'):$team->designation }}">

                                    @if($errors->first('designation'))
                                        <span style="color: red">{{ $errors->first('designation') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control mb-2" id="photo" placeholder="Enter photo" name="photo">
                                    @if ($team->photo != '')
                                        <a class="mb-2" href="{{ asset("uploads/teams/".$team->photo) }}" target="_blank"><img src="{{ asset("uploads/teams/".$team->photo) }}" width="300px"></a>
                                        @endif
                                    @if($errors->first('photo'))
                                        <span style="color: red">{{ $errors->first('photo') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="isadmin">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option selected value="">Select Status</option>
                                        <option value="2" {{ old('status') == 2|| $team->status == 2?'selected':'' }}>Inactive</option>
                                        <option value="1" {{ old('status') == 1 || $team->status == 1?'selected':'' }}>Active</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
