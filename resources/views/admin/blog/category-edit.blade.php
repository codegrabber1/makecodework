@extends('admin.layouts.admin')
@section('content')
<section class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        @if($item->exists)
                            <h2>Edit blog Category</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                                <li class="breadcrumb-item active">Edit category - {{ $item->bc_name }} </li>
                            </ul>
                        @else
                            <h2>Add blog Category</h2>
                            <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Add category for blog</li>
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
                                <form action="{{ route('admin.categories.update', $item->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                @else
                                <form action="{{ route('admin.categories.store') }}" method="POST">
                                    @csrf
                                @endif

                                @include('admin.includes.message')
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="bc_name" class="form-control " value="{{ $item->bc_name }}" placeholder="Enter category title">
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
    </section>
@endsection