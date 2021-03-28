@extends('admin.layouts.admin')
@section('content')
    <div class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        @if($item->exists)
                            <h2>Edit blog Category</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.tutorials.theme.index') }}">Themes</a></li>
                                <li class="breadcrumb-item active">Edit tutorial theme - {{ $item->theme_name }} </li>
                            </ul>
                        @else
                            <h2>Add tutorial Category</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.tutorials.theme.index') }}">Themes</a></li>
                                <li class="breadcrumb-item active">Add tutorial theme</li>
                            </ul>
                        @endif
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
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

                                @if($item->exists)
                                    <form action="{{ route('admin.tutorials.theme.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        @else
                                    <form action="{{ route('admin.tutorials.theme.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @endif
                                        @include('admin.includes.message')
                                        <div class="form-group">
                                            <label for="theme_image">Theme image</label>
                                            <div class="blogitem-image">
                                                <input type="file" name="theme_image" id="dropify-event" data-default-file="{{ asset(env('THEME')).'/images/themes/'. $item->theme_image }}">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="theme_name" class="form-control " value="{{ $item->theme_name }}" placeholder="Enter category title">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="slug" class="form-control" value="{{ $item->slug }}" placeholder="Enter category title">
                                                </div>

                                            </div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-info waves-effect m-t-20 submit" value="POST">
                                        <div class="checkbox right m-t-20" style="width: auto; float: right" >
                                            <input type="hidden"
                                                   name="is_published"
                                                   value="0">

                                            <input id="is_published"
                                                   name="is_published"
                                                   type="checkbox"
                                                   value="1"
                                                   @if($item->is_published) checked="checked" @endif >
                                            <label for="is_published">Publish</label>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection