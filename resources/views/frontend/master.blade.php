<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials._head')
</head>

<body>

    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="/"><img src="{{url('frontend/img/udacoding_1.png') }}"></a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="{{  request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                    <li><a href="#about">About  Mentoring</a></li>
                    {{-- <li><a href="#services">Services</a></li> --}}
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#leaderboard">Leaderboard</a></li>
                    <li><a href="#testimonials">Testimonial</a></li>
                    <li><a href="#footer">Join Us</a></li>
                    {{-- <li><a href="#team">Team</a></li> --}}
                    {{-- <li class="menu-has-children"><a href="">Drop Down</a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                            <li><a href="#">Drop Down 5</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a href="#contact">Contact</a></li> --}}
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- End Header -->
    <!-- ======= Intro Section ======= -->
    @yield('content')

        <!-- ======= Portfolio Section ======= -->
        <div class="section-header" style="padding-top: 20px;">
            <h2 class="text-center">Portofolio Mentoring Udacoding</h2>
        </div>
        <section id="portfolio" style="background: #48aa33">
            <div class="container">
                <div class="owl-carousel testimonials-carousel">
                    @foreach ($portofolios as $portofolio)
                    <div class="testimonial-item">
                        <div class="portofolio">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $portofolio->link }}"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials">
            <div class="container">
                <div class="section-header">
                    <h2 class="text-center">Testimoni Peserta Mentoring</h2>
                </div>
                {{-- <div class="owl-carousel testimonials-carousel">
                    @foreach ($testi as $testis)
                    <div class="testimonial-item">
                            <p>
                                <img src="{{url('frontend/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                                {{ $testis->deskripsi }}
                                <img src="{{url('frontend/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
                            </p>
                            <img src="{{url('frontend/img/avatar.png') }}" class="testimonial-img" alt="">
                            <h3>{{ $testis->participant->name }}</h3>
                            <h4>{{ $testis->participant->angkatan }}</h4>
                        </div>
                        @endforeach


                </div> --}}
            </div>
        </section><!-- End Testimonials Section -->

    @include('frontend.partials._footer')
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    @include('frontend.partials._script')

</body>

</html>
