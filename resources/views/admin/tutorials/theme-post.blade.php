@extends('admin.layouts.admin')
@section('content')
    <section class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Tutorial Posts</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tutorials.post.index') }}">Tutorial Posts</a></li>

                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.tutorials.post.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('admin.includes.message')
                </div>
                @foreach($posts as $post)
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="blogitem mb-5">
                                    <div class="blogitem-image">
                                        <a href="{{ route('admin.tutorials.post.edit', $post->id) }}">
                                            <img src="{{ asset(env('THEME')).'/images/themes/'. $post->p_image }}" alt="{{ $post->p_title }}">
                                        </a>

                                        <span class="blogitem-date">{{ \Carbon\Carbon::parse($post->created_at)->locale('uk')->isoFormat('dddd, d MMMM Y, H:m:s')}}</span>

                                    </div>
                                    <div class="blogitem-content">
                                        <div class="blogitem-header">
                                            <div class="blogitem-meta">
                                                <span><i class="zmdi zmdi-account"></i>By <a href="javascript:void(0);">{{ Auth::user()->name }}</a></span>
                                                <span><i class="zmdi zmdi-comments"></i><a href="blog-details.html">Comments({{ count($post->comments) }})</a></span>
                                            </div>
                                            <div class="blogitem-share">
                                                <ul class="list-unstyled mb-0">
                                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-facebook-box"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-twitter-box"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h5><a href="{{ route('admin.tutorials.post.edit', $post->id) }}">{{ $post->p_title }}</a>
                                            <span style="float:right">
                                        @if($post->is_published)
                                                    <p class="text-success">Published</p>
                                                @else
                                                    <p class="text-danger">Unpublished</p>
                                                @endif
                                      </span>
                                        </h5>

                                        <p>{!! $post->p_excerpt  !!} </p>
                                        <a href="{{ route('admin.tutorials.post.edit', $post->id) }}" class="btn btn-info">Read More</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                @if($posts->total() > $posts->count())
                    <div class="card">
                        <div class="body">
                            <ul class="pagination pagination-primary m-b-0">
                                <li class="page-item">
                                    {{ $posts->links() }}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            </div>
        </div>
    </section>
@endsection