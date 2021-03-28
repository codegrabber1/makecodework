@extends('admin.layouts.admin')
@section('content')
    <div class="blog-page">
        <div class="bode_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        @if($posts->exists)
                            <h2>Edit Post for blog</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                                <li class="breadcrumb-item active">Edit blog article - {{ $posts->bc_title }} </li>
                            </ul>
                        @else
                            <h2>Add Post for blog</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                                <li class="breadcrumb-item active">Add article</li>
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

                        @if($posts->exists)
                            <form action="{{ route('admin.posts.update', $posts->id)}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                        @else
                            <form action="{{ route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                        @endif

                            <div class="card">
                                <div class="body">
                                    <div class="form-group">
                                        <label for="bc_image"> Post image</label>
                                        <div class="blogitem-image">
                                            <input type="file" name="bc_image" id="dropify-event" data-default-file="{{ asset(env('THEME')).'/images/blog/'. $posts->bc_image }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="title"> Post title</label>
                                                <input type="text" id="title" name="bc_title" class="form-control" value="{{ old( 'title', $posts->bc_title )  }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="title"> Post slug</label>
                                                <input type="text" id="slug" name="slug" class="form-control" value="{{ old( 'title', $posts->slug )  }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="blog_category_id">Choose the category</label>
                                                <select name="blog_category_id" id="blog_category_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                                    <option value=""></option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}"
                                                                @if($cat->id == $posts->blog_category_id) selected @endif>
                                                            {{ $cat->bc_name }}
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
                                                <label for="bc_keyword">Keywords</label>
                                                <input id="bc_keyword" name="bc_keyword" type="text" class="form-control" value="{{ old('bc_keyword', $posts->bc_keyword ) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group form-line">
                                                <label for="bc_description">Description</label>
                                                <textarea rows="3" id="bc_description" name="bc_description" class="form-control resize ">
                                                {{ old('bc_description', $posts->bc_description) }}
                                             </textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="body">
                                     <div class="form-group">
                                            <label for="bc_text">Full text</label>
                                            <textarea id="editor" name="bc_text" class="form-control resize" rows="10">
                                                {{ old('bc_text', $posts->bc_text) }}
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
                                                       @if($posts->is_published) checked="checked" @endif >
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