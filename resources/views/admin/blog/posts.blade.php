@extends('admin.layouts.admin')
@section('content')
<section class="blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Posts</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                        {{-- <li class="breadcrumb-item active">New Post</li> --}}
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.posts.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="blogitem mb-5">
                                <div class="blogitem-image">
                                    <input type="file" name="image" id="dropify-event" data-default-file="{{ asset(env('THEME')).'/images/blog/'. $post->bc_image }}">
                                </div>
                                <div class="blogitem-content">
                                    <div class="blogitem-header">
                                        <div class="blogitem-meta">
                                            <span><i class="zmdi zmdi-account"></i>By <a href="javascript:void(0);">Michael</a></span>
                                            <span><i class="zmdi zmdi-comments"></i><a href="blog-details.html">Comments(3)</a></span>
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
                                    <h5><a href="">{{ $post->bc_title }}</a></h5>
                                    <p>{{ $post->bc_exerpt }}</p>
                                    <a href="blog-details.html" class="btn btn-info">Read More</a>
                                    {{--<h5><a href="blog-details.html">The Most Advance Business Plan</a></h5>--}}
                                    {{--<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem--}}
                                        {{--of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>--}}
                                    {{--<a href="blog-details.html" class="btn btn-info">Read More</a>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection