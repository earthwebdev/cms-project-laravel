@extends('backend.layout.master')

@section('title', 'Users')

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
                        <li class="breadcrumb-item active">Users</li>
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
                        <h3 class="card-title">Users Table</h3>
                        <div class="float-right">
                            <a href="{{ route('backend.users.create') }}"><button>Create Users</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>IsAdmin</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}

                                    </td>
                                    <td>{{ $user->is_admin == 1?'Yes':'No' }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('backend.users.edit', $user->id)  }}" title="edit"><i class="nav-icon fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('backend.users.destroy', ['user' => $user->id]) }}" title="delete"><i class="nav-icon fa fa-trash"></i></a> --}}
                                        <form class="d-inline-block" action="{{ route('backend.users.destroy', ['user' => $user->id]) }}" method="POST">
                                            @csrf

                                            @method('DELETE')

                                            <button onclick="return confirm('Are you sure, you want to delete this user?')" style="border: none;background: none;" type="submit" class=""><a href="javascript:void();" title="delete"><i class="nav-icon fa fa-trash"></i></a></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No Data Found</td>

                                </tr>
                                @endforelse



                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-right">

                        {{ $users->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </div>


        </div>
    </section>
    <!-- /.content -->

@endsection
