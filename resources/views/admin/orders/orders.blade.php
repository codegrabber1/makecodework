@extends('admin.layouts.admin')
@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Orders</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                        <li class="breadcrumb-item"><a href="">Orders</a></li>
                        {{-- <li class="breadcrumb-item active">New Post</li> --}}
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 c_list c_table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th data-breakpoints="xs">Phone</th>
                                    <th data-breakpoints="xs sm md">Email</th>
                                    <th data-breakpoints="xs sm md">Web Type</th>
                                    <th data-breakpoints="xs sm md">Created</th>
                                    <th data-breakpoints="xs">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if( $data )
                                    @foreach( $data as $item )
                                        <tr>
                                            <td>
                                                {{ $item->id }}
                                            </td>
                                            <td>
                                                <p class="c_name">{{ $item->username }}</p>
                                            </td>
                                            <td>
                                                <p class="c_name">{{ $item->userephone }}</p>
                                            </td>
                                            <td>
                                                <p class="c_name">{{ $item->useremail }}</p>
                                            </td>
                                            <td>
                                                <p class="c_name">{{ $item->webtype }}</p>
                                            </td>
                                            <td>
                                                <p class="c_name">{{ $item->created_at }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.order.show', $item->id) }}"
                                                   class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                                <form  class="align-right" action="{{ route('admin.order.destroy', $item->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" value="Delete"> <i class="zmdi zmdi-delete"></i></button>
                                                </form>
                                                {{--<a href="{{ route('admin.order.destroy', $item->id) }}"--}}
                                                   {{--class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>
                                            <p class="c_name">No orders yet!</p>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop