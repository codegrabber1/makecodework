@extends('admin.layouts.admin')

@section('content')
   <section class="blog-page">
       <div class="body_scroll">
           <div class="block-header">
               <div class="row">
                   <div class="col-lg-7 col-md-6 col-sm-12">
                       <h2>Blog Comments</h2>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name', 'Makecodework') }}</a></li>
                           <li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Comments</a></li>
                           {{-- <li class="breadcrumb-item active">New Post</li> --}}
                       </ul>
                       <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                   </div>
                   <div class="col-lg-5 col-md-6 col-sm-12">
                       <a class="btn btn-primary btn-icon float-right right_icon_toggle_btn" href="{{ route('admin.comments.create') }}"><i class="zmdi zmdi-hc-fw"></i></a>
                       <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                   </div>
               </div>
           </div>
           <div class="container-fluid">
               <div class="row">
                   <div class="col-12">
                       <div class="">
                           <div class="body">
                               <div class=" table-responsive">
                                    <table class="table table-hover mb-0 c_list c_table">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Comment</th>
                                       <th>Post</th>
                                       <th>Author</th>
                                       <th>Moderated</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($comments as $comment)
                                       <tr>
                                           <th scope="row">{{ $comment->id }}</th>
                                           <td>{!! $comment->comment_text !!}</td>
                                           <td>{{ $comment->posts->bc_title }}</td>
                                           <td>
                                               @if($comment->user_id)
                                                   {{ $comment->user->name }}
                                                   @else
                                                   {{ $comment->author_name }}
                                               @endif
                                               </td>
                                           <td>
                                               @if($comment->moderated)
                                                   <span class="text-success">Published</span>
                                               @else
                                                   <span class="text-danger">Unpublished</span>
                                               @endif
                                               <small style="display:block;">{{ $comment->created_at }}</small>
                                           </td>
                                           <td>
                                               <a style="display: block; float: left" class="btn btn-icon btn-icon-mini btn-round btn-success"
                                                  href="{{ route('admin.comments.edit', $comment->id) }}">
                                                   <i class="zmdi zmdi-hc-fw"></i></a>
                                               <form  class="align-right" action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                                   @method('delete')
                                                   @csrf
                                                   <button type="submit" class="btn btn-icon btn-icon-mini btn-round btn-danger" value="Delete"> <i class="zmdi zmdi-delete"></i></button>
                                               </form></td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                               </div>
                           </div>
                           @if($comments->total() > $comments->count())
                               <div class="card">
                                   <div class="body">
                                       <ul class="pagination pagination-primary m-b-0">
                                           <li class="page-item">
                                               {{ $comments->links() }}
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
@endsection