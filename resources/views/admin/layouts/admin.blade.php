<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Makecodework') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/summernote/dist/summernote.css') }}"/>



    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
    
</head>
<body class="theme-blush">
    <!-- Overlay For Sidebars -->
<div class="overlay"></div>
   <!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Search..." />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<!-- Left Sidebar - Main list-->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{ route('home') }}"><img src="{{ asset('admin/assets/images/logo.svg') }}" width="25" alt="{{ config('app.name', 'Makecodework') }}"><span class="m-l-10">{{ config('app.name', 'Makecodework') }}</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="{{ asset('admin/assets/images/profile_av.jpg') }}" alt="User!!"></a>
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        <small>{{ Auth::user()->role }}</small>
                        <div class="d" aria-labelledby="navbarDropdown">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            @can("manage-users")
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Users</span></a>

                <ul class="ml-menu">
                    <li><a href="{{ route( 'admin.users.index' ) }}">All Users</a></li>
                    <li><a href="">Roles</a></li>
                </ul>
                
            </li>
            @endcan
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Tutorials</span></a>
                <ul class="ml-menu">
                    {{-- blog-post.html --}}
                    <li><a href="{{ route('admin.theme.tutorials.index') }}">Theme</a></li>
                    <li><a href="{{ route('admin.tutorials.index') }}">Categories</a></li>
                    <li><a href="blog-post.html">Blog Post</a></li>
                    <li><a href="blog-grid.html">Grid View</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>
                <ul class="ml-menu">
                    
                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                    <li><a href="blog-grid.html">Grid View</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Settings</span></a></li>
        </ul>
    </div>
</aside>
<!-- #Left Sidebar - Main list-->

<!-- Right Sidebar  - Additional settings -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- Main Content -->
<section class="content">
    @yield('content')
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}/"></script> <!-- slimscroll, waves Scripts Plugin Js -->


<script src="{{ asset('admin/assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/summernote/dist/summernote.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dropzone/dropzone.js') }}"></script>


<script src="{{ asset('admin/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/index.js') }}"></script>

</body>
</html>