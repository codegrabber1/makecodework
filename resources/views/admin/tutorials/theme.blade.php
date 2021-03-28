@extends('admin.layouts.admin')
@section('content')
    <div class="blog-page">
        <div class="bode_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Tutorials Themes</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tutorials.theme.index') }}">Themes</a></li>
                            {{-- <li class="breadcrumb-item active">New Post</li> --}}
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.tutorials.theme.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid content file_manager">
                @include('admin.includes.message')
                <div id=""  class="row list-unstyled  clearfix">
                    @foreach($themes as $theme)

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-30">
                            <div class="card">
                                <a href="{{ route('admin.tutorials.theme.edit', $theme->id)  }}" class="file">
                                    <div class="hover">
                                        <form id="theme-del" action="{{ route('admin.tutorials.theme.destroy', $theme->id) }}" method="post" >
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-icon btn-icon-mini btn-round btn-danger" value="Delete"> <i class="zmdi zmdi-delete"></i></button>
                                        </form>
                                    </div>
                                    <div class="image">
                                        <img class="img-fluid" src="{{ asset(env('THEME')).'/images/themes/'. $theme->theme_image }}" alt="{{ $theme->theme_name }}">
                                    </div>
                                    <div class="file-name">
                                        <p class="m-b-5 text-muted">{{ $theme->theme_name }}</p>
                                        @if($theme->is_published)
                                            <small class="text-success">Published</small>
                                        @else
                                            <small class="text-danger">Unpublished</small>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection