@extends('admin.layouts.admin')
@section('content')
    <section class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Tutorial Categories</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tutorials.category.index') }}">Categories</a></li>
                            {{-- <li class="breadcrumb-item active">New Post</li> --}}
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.tutorials.category.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @include('admin.includes.message')
                        <div class="card">
                            <div class="body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Theme</th>
                                        <th>Author</th>
                                        <th>Category name</th>
                                        <th>Published</th>
                                        {{--<th>Created</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->theme->theme_name }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->th_cat_name }}</td>
                                            <td>
                                                @if($item->is_published)
                                                    <span class="text-success">Published</span>
                                                @else
                                                    <span class="text-danger">Unpublished</span>
                                                @endif
                                                <small style="display:block;">{{ $item->created_at }}</small>

                                            </td>
                                            {{--<td>{{ $item->created_at }}</td>--}}
                                            <td>
                                                <a style="display: block; float: left" class="btn btn-icon btn-icon-mini btn-round btn-success" href="{{ route('admin.tutorials.category.edit', $item->id) }}">
                                                    <i class="zmdi zmdi-hc-fw"></i></a>
                                                <form  class="align-right" action="{{ route('admin.tutorials.category.destroy', $item->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-icon btn-icon-mini btn-round btn-danger" value="Delete"> <i class="zmdi zmdi-delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection