@extends('admin.layouts.admin')
@section('content')
    <div class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        @if($themes->exists)
                            <h2>Edit Tutorials Theme</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.theme.tutorials.index') }}">Themes</a></li>
                                <li class="breadcrumb-item active">Edit category - {{ $themes->theme_name }} </li>
                            </ul>
                        @else
                            <h2>Add Tutorial Theme</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.theme.tutorials.index') }}">Themes</a></li>
                                <li class="breadcrumb-item active">Add theme</li>
                            </ul>
                        @endif
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                @if($themes->exists)
                                    <form action="{{ route('admin.theme.tutorials.update', $themes->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                @else
                                    <form action="{{ route('admin.theme.tutorials.store') }}" method="post">
                                    @csrf
                                @endif
                                    @include('admin.includes.message')
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="theme_name" class="form-control " value="{{ $themes->theme_name }}" placeholder="Enter theme title">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="slug" class="form-control" value="{{ $themes->slug }}" placeholder="Enter theme slug">
                                            </div>
                                        </div>

                                    </div>
                                    <input type="submit" name="submit" class="btn btn-info waves-effect m-t-20 submit" value="POST">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    theme edit
@endsection