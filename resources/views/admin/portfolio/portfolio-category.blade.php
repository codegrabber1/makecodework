@extends('admin.layouts.admin')
@section('content')
    <div class="blog-page">
        <div class="bode_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        header
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.portfolio.category.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid file_manager">
                @include('admin.includes.message')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Published</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($cats as $cat)
                                      <tr>
                                          <th scope="row">{{ $cat->id  }}</th>
                                          <td>{{ $cat->pc_name }}</td>
                                          <td>{{ $cat->slug }}</td>
                                          <td>
                                              @if($cat->is_published)
                                                  <span class="text-success">Published</span>
                                              @else
                                                  <span class="text-danger">Unpublished</span>
                                              @endif
                                          </td>
                                          <td>
                                              <a style="display: block; float: left" class="btn btn-icon
                                              btn-icon-mini btn-round btn-success" href="{{ route('admin.portfolio.category.edit', $cat->id) }}">
                                                  <i class="zmdi zmdi-hc-fw"></i></a>
                                              <form  class="align-right" action="{{ route('admin.portfolio.category.destroy', $cat->id) }}" method="POST">
                                                  @method('delete')
                                                  @csrf
                                                  <button type="submit" class="btn btn-icon btn-icon-mini btn-round
                                                  btn-danger" value="Delete"> <i class="zmdi zmdi-delete"></i></button>
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
    </div>
@stop