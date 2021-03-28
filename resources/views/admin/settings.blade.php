@extends('admin.layouts.admin')
@section('content')
    <section class="blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Main Settings</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                            {{-- <li class="breadcrumb-item active">New Post</li> --}}
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.categories.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    {{--<div class="col-lg-12">--}}
                        @include('admin.includes.message')
                        <div class="col-lg-5 col-md-12">
                            <div class="card mcard_3">
                                <div class="body">
                                    @if($items->exists)
                                        <form action="{{ route('admin.settings.update', $items->id) }}" method="post" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                    @else
                                        <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    @endif
                                    <div class="form-group">
                                        <label for="bc_image">Main logo</label>
                                        <div class="blogitem-image">
                                            <input type="file" name="logo" id="dropify-event" data-default-file="{{ asset(env('THEME')).'/images/'. $items->logo }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="social-links list-unstyled">
                                                <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                                        </div>
                                        <div class="col-4">
                                            <small>Following</small>
                                            <h5>852</h5>
                                        </div>
                                        <div class="col-4">
                                            <small>Followers</small>
                                            <h5>13k</h5>
                                        </div>
                                        <div class="col-4">
                                            <small>Post</small>
                                            <h5>234</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="body">
                                    <div class="form-group">
                                        <label for="title"> Facebook</label>
                                        <input type="text" id="slug" name="facebook" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Twitter</label>
                                        <input type="text" id="slug" name="twitter" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Youtube</label>
                                        <input type="text" id="slug" name="youtube" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Telegram</label>
                                        <input type="text" id="slug" name="telegram" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Viber</label>
                                        <input type="text" id="slug" name="viber" class="form-control" value="">
                                    </div>
                                    <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</span>
                                    <div class="form-group">
                                        @if($items->exists)
                                            <a href="{{ route('admin.settings.edit', $items->id) }}" class="btn btn-info waves-effect m-t-20">Edit Settings</a>
                                        @else
                                            <a href="{{ route('admin.settings.create') }}" class="btn btn-info waves-effect m-t-20">Set Settings</a>
                                        @endif
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            smth
                        </div>
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection