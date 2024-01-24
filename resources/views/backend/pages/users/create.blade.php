@extends('backend.layout.master')

@section('title', 'Users Create')

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
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backend.users.index') }}">Users</a></li>
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
                        <h3 class="card-title">Create Users</h3>

                    </div>

                    <div>
                        <form role="form" action="{{ route('backend.users.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                                    @if($errors->first('name'))
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                                    @if($errors->first('email'))
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password') }}">
                                    @if($errors->first('password'))
                                        <span style="color: red">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Enter confirm password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                    @if($errors->first('password_confirmation'))
                                        <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="isadmin">Is Admin</label>
                                    <select name="isadmin" class="form-control" id="isadmin">
                                        <option value="">Select Is Admin</option>
                                        <option value="0" {{ old('isadmin') == false?'selected':'' }}>No</option>
                                        <option value="1" {{ old('isadmin') == 1?'selected':'' }}>Yes</option>
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

@endsection
