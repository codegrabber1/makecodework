@extends('admin.layouts.admin')
@section('content')
    <section class="file_manager">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Portfolio</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i>
                                    {{config('app.name', 'Makecodework')}}</a></li>
                            <li class="breadcrumb-item active">Portfolio</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-success btn-icon float-right"
                           type="button"><i class="zmdi
                        zmdi-upload"></i></a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-12">
                        @include('admin.includes.message')
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <ul class="nav nav-tabs pl-0 pr-0">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                        href="#all">All</a></li>
                                @foreach($pc_cats as $cat)
                                    <li class="nav-item"><a class="nav-link " data-toggle="tab"
                                                            href="#{{ $cat->pc_name  }}">{{ $cat->pc_name  }}</a></li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="all">
                                    <div class="row clearfix">
                                        @foreach($items as $item)
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <a href="{{ route( 'admin.portfolio.edit', $item->id ) }}" class="file">
                                                    <div class="hover">
                                                        <form action="{{ route( 'admin.portfolio.destroy', $item->id
                                                        )}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="image">
                                                        <img src="{{ asset(env('THEME')) . '/images/portfolio/' .
                                                             $item->img
                                                            }}" alt="{{ $item->title }}"
                                                             class="img-fluid">
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">{{ $item->title }}</p>
                                                        <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @foreach($items as $item)

                                    <div class="tab-pane " id="{{ $item->p_category->pc_name  }}">
                                         <div class="row clearfix">
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="card">
                                                    <a href="javascript:void(0);" class="file">
                                                        <div class="hover">
                                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="image">
                                                            <img src="{{ asset(env('THEME')) . '/images/portfolio/' .
                                                             $item->img
                                                            }}" alt="{{ $item->title }}"
                                                                 class="img-fluid">
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">{{ $item->title }}</p>
                                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop