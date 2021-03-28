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
                                <li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Comments</a></li>
                                <li class="breadcrumb-item active">Comment moderation </li>
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
                                    <form action="{{ route('admin.comments.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        @else
                                            <form action="{{ route('admin.comments.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @endif
                                                @include('admin.includes.message')
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="th_cat_name">Comment for post</label>
                                                                <p><a href="{{ route('admin.posts.edit', $item->posts->id) }}">{{ $item->posts->bc_title }}</a></p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="th_cat_name">Author of comment</label>
                                                                @if($item->user_id)
                                                                <p><a href="{{ route('admin.users.edit', $item->user->id) }}">{{ $item->user->name }}</a></p>
                                                                <p><a href="mailto:{{ $item->user->email }}">{{ $item->user->email }}</a></p>
                                                                @else
                                                                    <p>{{ $item->author_name }}</p>
                                                                    <p><a href="mailto:{{ $item->author_email }}">{{ $item->author_email }}</a></p>
                                                                @endif
                                                            <div class="form-group">
                                                                <textarea id="editor" name="comment_text" class="form-control resize" rows="10">
                                                                    {{ old('bc_text', $item->comment_text) }}
                                                                 </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                                <input type="submit" name="submit" class="btn btn-info waves-effect m-t-20 submit" value="POST">
                                                <div class=" right m-t-20" style="width: auto; float: right" >
                                                    <input type="hidden"
                                                           name="moderated"
                                                           value="0">

                                                    <input id="moderated"
                                                           name="moderated"
                                                           type="checkbox"
                                                           value="1"
                                                           @if($item->moderated) checked="checked" @endif >
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