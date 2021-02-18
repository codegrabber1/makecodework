@extends(env('THEME').'.layouts.main')
@section('content')
    <!-- =============== 1.2 Home Area Start ====================-->
    <section class="home" id="home">
        <div class="profile">
            <img src="{{asset(env('THEME')).'/images/home/coding_dtvakc.jpg'}}" alt="portfolio">
            <a class="lightbox-video" href="https://www.youtube.com/watch?v=jgL15BQmOlw">
                <div class="video">
                    <div class="play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 res">
                    <div class="portfolio-content">
                        <h1>
                            <span>Hello, </span> I’m MakeCodeWork
                        </h1>
                        <h4>Web Developer </h4>
                        <a class="theme-btn hover-target" href="#">Download<span> CV</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-media">
            <ul>
                <li class="active"><a class="hover-target" href="#"><span>facebook</span> <i class="fab fa-facebook-f"></i></a></li>
                <li><a class="hover-target" href="#"><span>linkedin</span> <i class="fab fa-linkedin-in"></i></a></li>
                <li><a class="hover-target" href="#"><span>github</span> <i class="fab fa-github"></i></a></li>
                <li><a class="hover-target" href="#"><span>behance</span> <i class="fab fa-behance"></i></a></li>
                <li><a class="hover-target" href="#"><span>pinterest</span> <i class="fab fa-pinterest-p"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- =============== 1.2 Home Area End ====================-->
    <!-- =============== 1.3 Tutorial Area  Start====================-->
    <section class="blog-area" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Tutorials</h2>
                        <p>Sed ut pespciatis unde omnis iste natus error sit olptatem accusantium doloremque ludantium veritatis.</p>
                    </div>
                </div>
            </div>
            <div class="row grid">
                @foreach($themes as $theme)
                <div class="col-lg-4 col-md-6 grid-item">
                    <a href="{{ route('tutorials', $theme->id) }}">
                        <div class="port-img">
                            <img src="{{ asset(env('THEME')).'/images/themes/'. $theme->theme_image }}" alt="{{ $theme->theme_name }}" class="img-fluid">
                            <span>{{ $theme->theme_name }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =============== 1.3 Tutorial Area  End ====================-->
    <!-- =============== 1.5 PortfolioController Area ====================-->
    <section class="portfolio-area" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our Portfolio</h2>
                        <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="filtering-btn">
                        <ul class="filter-button-group">
                            <li class="filter-btn active-btn" data-filter="*">All Project</li>
                            <li class="filter-btn" data-filter=".webdesign">Web Design</li>
                            <li class="filter-btn" data-filter=".uidesign">UI/UX Design</li>
                            <li class="filter-btn" data-filter=".photography">Photography</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row grid">
                <div class="col-lg-4 col-md-6 grid-item uidesign photography">
                    <a href="assets/image/portfolio/1.jpg" class="light-box">
                        <div class="port-img">
                            <img src="assets/image/portfolio/image1.jpg" alt="portlio-image" class="img-fluid">
                            <span>Photography</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 grid-item photography webdesign">
                    <a href="assets/image/portfolio/2.jpg" class="light-box">
                        <div class="port-img">
                            <img src="assets/image/portfolio/image2.jpg" alt="portlio-image" class="img-fluid">
                            <span>UI/UX Design</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 grid-item uidesign webdesign">
                    <a href="assets/image/portfolio/3.jpg" class="light-box">
                        <div class="port-img">
                            <img src="assets/image/portfolio/image3.jpg" alt="portlio-image" class="img-fluid">
                            <span>Web Design</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 grid-item webdesign photography uidesign">
                    <a href="assets/image/portfolio/4.jpg" class="light-box">
                        <div class="port-img">
                            <img src="assets/image/portfolio/image4.jpg" alt="portlio-image" class="img-fluid">
                            <span>UI/UX Design</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 grid-item photography uidesign">
                    <a href="assets/image/portfolio/5.jpg" class="light-box">
                        <div class="port-img">
                            <img src="assets/image/portfolio/image5.jpg" alt="portlio-image" class="img-fluid">
                            <span>Photography</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== 1.5 PortfolioController Area End ====================-->
    <!-- =============== 1.7 Blog Area  Start====================-->
    <section class="blog-area" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Popular Blog</h2>
                        <p>Sed ut pespciatis unde omnis iste natus error sit olptatem accusantium doloremque ludantium veritatis.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog owl-carousel">
                        @foreach($lastPosts as $item)
                        <div class="single-blog">
                            <a href="{{ route('blog.category.post', $item->id) }}">
                                {!! $item->bc_title !!}</a>
                            <div class="zoom">
                                <img src="{{ asset(env('THEME')).'/images/blog/'.$item->bc_image }}" alt="{{ $item->bc_title }}">
                            </div>
                            <p>{!! $item->bc_excerpt !!} </p>
                            <div class="comment-like">
                                <ul>
                                    <li> 30 Comments</li>
                                    
                                </ul>
                                <a class="theme-btn read-more" href="{{ route('blog.category.post', $item->id) }}">Read Details</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="theme-btn more-blog text-center" href="{{ route('blog') }}">more blog</a>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== 1.7 Blog Area  End ====================-->
    <!-- =============== 1.8 Hire Area Start ====================-->
    <section class="hire-area" id="hire">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hire">
                        <div class="hire-content">
                            <h3>I'm Available</h3>
                            <h2>For Freelancing</h2>
                        </div>
                        <a class="theme-btn hire-btn" href="#"> hire me</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== 1.8 Hire Area Start ====================-->
    <!-- =============== 1.9 Contact Area Start ====================-->
    <section class="contact-area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-content text-center">
                        <a href="index-2.html"><img src="assets/image/logo/logo.png" alt="logo"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum </p>
                        <div class="hr"></div>
                        <h6>1590 McDowell Street Unionville, TN 37180, United State.</h6>
                        <h6>+080 2541 5486 12<span>|</span>+080 2541 5486 12</h6>
                        <div class="contact-social">
                            <ul>
                                <li><a class="hover-target" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="hover-target" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a class="hover-target" href="#"><i class="fab fa-github"></i></a></li>
                                <li><a class="hover-target" href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a class="hover-target" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== 1.9 Contact Area End ====================-->
@stop