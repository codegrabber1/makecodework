@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">

                        <table style="width: 100%">
                            <tr>
                                <td>ID</td>
                                <td>User name</td>
                                <td>User email</td>
                                <td>Roles</td>
                                <td>Action</td>
                            </tr>
                            @foreach( $users as  $user )
                            <tr>
                                <td> {{ $user->id  }}</td>
                                <td> {{ $user->name  }}</td>
                                <td> {{ $user->email  }}</td>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
