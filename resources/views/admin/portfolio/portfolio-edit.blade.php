@extends('admin.layouts.admin')
@section('content')
<section>
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Portfolio</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i>
                                {{config('app.name', 'Makecodework')}}</a></li>
                        {{--<li class="breadcrumb-item"><a href="file-dashboard.html">File Manager</a></li>--}}
                        <li class="breadcrumb-item active"><a href="{{ route('admin.portfolio.index')
                        }}">Portfolio</a></li>
                        <li class="breadcrumb-item active">Add your work</li>
                    </ul>
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
                    @if($items->exists)
                        <form action="{{ route('admin.portfolio.update', $items->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                       @else
                        <form action="{{ route('admin.portfolio.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                    @endif
                            <div class="card">
                                <div class="body">
                                    <div class="form-group">
                                        <label for="img"> Portfolio image</label>
                                        <div class="blogitem-image">
                                            <input type="file" name="img" id="dropify-event"
                                                   data-default-file="{{ asset(env('THEME')).'/images/portfolio/'.
                                                   $items->img }}">
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="title"> Post title</label>
                                                    <input type="text" id="title" name="title" class="form-control" value="{{ old( 'title', $items->title )  }}">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="slug"> Post slug</label>
                                                    <input type="text" id="slug" name="slug" class="form-control"
                                                           value="{{ old( 'slug', $items->slug )  }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="portfolio_category_id">Choose the category</label>
                                                <select name="portfolio_category_id" id="portfolio_category_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                                    <option value=""></option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}"
                                                                @if($cat->id === $items->portfolio_category_id)
                                                                selected
                                                                @endif>
                                                            {{ $cat->pc_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="slug"> Link for the ready web-site </label>
                                                <input type="text" id="site_link" name="site_link" class="form-control"
                                                       value="{{ old( 'site_link', $items->site_link )  }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="keyword">Keywords</label>
                                                <input id="keyword" name="keyword" type="text" class="form-control" value="{{ old('keyword', $items->keyword ) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group form-line">
                                                <label for="description">Description</label>
                                                <textarea rows="3" id="description" name="description" class="form-control resize ">
                                                {{ old('description', $items->description) }}
                                             </textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="body">
                                    <div class="form-group">
                                        <label for="title_task">Write tasks you were solving while codding</label>
                                        <input id="title_task" name="title_task" type="text" class="form-control"
                                               value="{{ old('title_task', $items->title_task ) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="task_description">Describe how you solved tasks in the
                                            template</label>
                                        <textarea id="editor" name="task_description" class="form-control resize" rows="10">
                                                {{ old('task_description', $items->task_description) }}
                                             </textarea>
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                        <input type="submit" name="submit" class="btn btn-info waves-effect m-t-20 align-left" value="POST">
                                        <div class="checkbox right m-t-20" style="width: auto; float: right" >
                                            <input type="hidden"
                                                   name="is_published"
                                                   value="0">

                                            <input id="is_published"
                                                   name="is_published"
                                                   type="checkbox"
                                                   value="1"
                                                   @if($items->is_published) checked="checked" @endif >
                                            <label for="is_published">Publish</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop