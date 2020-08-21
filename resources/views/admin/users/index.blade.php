@extends('admin.layouts.admin')
@section('content')
    <div class="blog-page">
        <div class="bode_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>User's management</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item active">All users</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.users.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class=" table-responsive">
                                <table class="table table-hover mb-0 c_list c_table" >
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td data-breakpoints="xs">User name</td>
                                            <td data-breakpoints="xs sm md">User email</td>
                                            <td data-breakpoints="xs sm md">User phone</td>
                                            <td data-breakpoints="xs sm md">Roles</td>
                                            <td data-breakpoints="xs">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $users as  $user )
                                        <tr>
                                            <td> {{ $user->id  }}</td>
                                            <td> {{ $user->name  }}</td>
                                            <td><a href="mailto:{{ $user->email  }}">{{ $user->email  }}</a></td>
                                            <td>phone here</td>
                                            <td> {{ implode( ', ', $user->roles()->get()->pluck('name')->toArray() )  }}</td>
                                            <td>
                                                @can("edit-users")
                                                    <a href="{{ route( 'admin.users.edit', $user->id)  }}" class="btn btn-primary float-left">Edit</a>
                                                @endcan
                                                @can("delete-users")
                                                    <form action="{{ route( 'admin.users.destroy', $user ) }}" method="post" class="float-left">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning">Delete</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
