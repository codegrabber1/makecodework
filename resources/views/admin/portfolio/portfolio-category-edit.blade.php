@extends('admin.layouts.admin')
@section('content')
<div class="blog-page">
    <div class="bode_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    @if($item->exists)
                        <h2>Edit category for portfolio</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.category.index')
                            }}">Portfolio category</a></li>
                            <li class="breadcrumb-item active">Edit category - {{ $item->pc_name }} </li>
                        </ul>
                     @else
                        <h2>Add category for portfolio</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.category.index')
                            }}">Portfolio Category</a></li>
                            <li class="breadcrumb-item active">Add category</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            @if($item->exists)
                                <form action="{{ route('admin.portfolio.category.update', $item->id) }}" method="post">
                                @method('PUT')
                                @csrf
                            @else
                                <form action="{{ route('admin.portfolio.category.store')}}" method="post">
                                @csrf
                            @endif
                                @include('admin.includes.message')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="pc_name" class="form-control " value="{{ old
                                            ('pc_name', $item->pc_name) }}" placeholder="Enter category name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="slug" class="form-control" value="{{ old('slug',
                                             $item->slug) }}" placeholder="Enter category slug">
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
@stop