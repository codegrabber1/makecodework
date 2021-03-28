@extends('admin.layouts.admin')
@section('content')
    <div class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        @if($themes->exists)
                            <h2>Edit Tutorials Post</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.tutorials.post.index') }}">Tutorial Posts</a></li>
                                <li class="breadcrumb-item active">Edit tutorial post - {{ $themes->p_title }} </li>
                            </ul>
                        @else
                            <h2>Add Tutorial Theme</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.tutorials.post.index') }}">Tutorial Posts</a></li>
                                <li class="breadcrumb-item active">Add tutorial post</li>
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
                        @if($themes->exists)
                            <form action="{{ route('admin.tutorials.post.update', $themes->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                        @else
                            <form action="{{ route('admin.tutorials.post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        @endif
                            @include('admin.includes.message')
                                <div class="card">
                                    <div class="body">
                                        <div class="form-group">
                                            <label for="">Tutorial post image</label>
                                            <div class="blogitem-image">
                                                <input type="file" name="p_image" id="dropify-event" data-default-file="{{ asset(env('THEME')).'/images/themes/'. $themes->p_image }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="p_title">Tutorial post title</label>
                                                    <input type="text" name="p_title" class="form-control " value="{{ old('title', $themes->p_title) }}" placeholder="Enter theme post title">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6">
                                                <label for="p_slug">Tutorial post slug</label>
                                                <input type="text" name="p_slug" class="form-control" value="{{ old('slug',$themes->p_slug) }}" placeholder="Enter theme post slug">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="theme_category_id"> Choose the category</label>
                                                    <select name="theme_category_id" id="theme_category_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                                        <option value=""></option>
                                                        @foreach($categories as $cat)
                                                            <option value="{{ $cat->id }}"
                                                               @if($cat->id == $themes->theme_category_id) selected @endif>
                                                                {{ $cat->th_cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="p_keywords">Keywords</label>
                                                    <input id="p_keywords" name="p_keywords" type="text" class="form-control" value="{{ old('p_keywords', $themes->p_keywords ) }}" />
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group form-line">
                                                    <label for="p_description">Description</label>
                                                    <textarea rows="3" id="p_description" name="p_description" class="form-control resize ">
                                        {{ old('p_description', $themes->p_description) }}
                                     </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="body">
                                        <div class="form-group">
                                            <label for="p_text">Full text</label>
                                            <textarea id="editor" name="p_text" class="form-control resize" rows="10">
                                        {{ old('p_text', $themes->p_text) }}
                                     </textarea>
                                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                            <input type="submit" name="submit" class="btn btn-info waves-effect m-t-20 align-left" value="POST">
                                            <div class="checkbox right m-t-20" style="width: auto; float: right" >
                                                <input type="hidden"
                                                       name="is_published"
                                                       value="0">

                                                <input id="is_published"
                                                       name="is_published"
                                                       type="checkbox"
                                                       value="1"
                                                       @if($themes->is_published) checked="checked" @endif >
                                                <label for="is_published">Publish</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection