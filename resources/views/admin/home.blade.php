@extends('admin.layouts.admin')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2 >Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>Traffic</h6>
                        <h2>20 <small class="info">of 1Tb</small></h2>
                        <small>2% higher than last month</small>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <div class="row clearfix">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h2 class="font-head">Tutorial Category</h2>
        <div class="row clearfix">
            @foreach($tutorialsCategory as $item)
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="">{{ $item->th_cat_name }}</a>
                    <img src="{{ asset(env('THEME')).'/images/themes/'. $item->th_cat_img }}" alt="">
                    
                </div>
            @endforeach
        </div>

        <h2 class="font-head">Blog Category</h2>
        <div class="row clearfix">
            @foreach($blogCategory as $item)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="">{{ $item->bc_name }}</a>
                    {{--<img src="{{ asset(env('THEME')).'/images/themes/'. $item->th_cat_img }}" alt="">--}}
                </div>
            @endforeach
        </div>
    </div>
@endsection