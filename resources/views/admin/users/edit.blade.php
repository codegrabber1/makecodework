@extends('admin.layouts.admin')

@section('content')
    <div class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User's management</h2>
                    @if($user->exists)
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">All users</a></li>
                        <li class="breadcrumb-item active">Edit User - <strong>{{ $user->name }}</strong></li>
                    </ul>
                    @else
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">All users</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ul>
                    @endif
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
                            <div class="body">
                                @if($user->exists)
                                <form action="{{ route('admin.users.update', $user) }}" name="users" method="post">
                                    @csrf
                                    @method('PUT')
                                @else
                                <form action="{{ route('admin.users.store') }}" name="users" method="post">
                                    @csrf
                                @endif
                                    <div class="form-group row">
                                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('User name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $user->password }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="roles" class="col-md-2 col-form-label text-md-right">{{ __('User role') }}</label>
                                        @foreach( $roles as $role )
                                            <div class="form-check">
                                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                       @if( $user->roles->pluck('id')->contains($role->id) ) checked @endif;
                                                >
                                                <label for="">{{ $role->name }}</label>
                                            </div>

                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
