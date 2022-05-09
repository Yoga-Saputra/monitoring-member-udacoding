@extends('frontend.master')
@section('content')
<section id="intro">

    <div class="intro-content">
        <h1>Mentoring <span>Program</span></h1>
    </div>

</section><!-- End Intro Section -->
<main id="main">

    <section id="leaderboard">
        <div class="container">
            <div class="section-header">
                <h2 class="text-center">Leaderboard Mentoring Program</h2>
            </div>
            <div class="section-header">
                <div class="row d-flex justify-content-around" id="stats">
                    <div class="col-3 col-md-2 stats-detail ">
                        <a href="/" class="{{  request()->is('/') ? 'active' : '' }}">Flutter</a>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <a href="{{ route('frontend.kotlin') }}" class="{{  request()->is('leaderboard-kotlin') ? 'active' : '' }}">Kotlin</a>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <a href="{{ route('frontend.UiDesign') }}" class="{{  request()->is('leaderboard-UiDesign') ? 'active' : '' }}">UiDesign</a>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <a href="{{ route('frontend.web') }}" class="{{  request()->is('leaderboard-web') ? 'active' : '' }}">Web</a>
                    </div>
                </div>
            </div>
            <div class="batch d-flex justify-content-end pb-2 pt-2">
                <span>Batch : &nbsp;</span>
                <select class="styp" type="text" name="angkatan"
                        onchange="document.location.href = ' leaderboard-web?angkatan=' + this.value+' ' ">
                    <option value="" selected="">None</option>
                    <option value="Batch 1" {{( request('angkatan') ==  'Batch 1') ? 'selected' : '' }}>Batch 1</option>
                    <option value="Batch 2" {{( request('angkatan') ==  'Batch 2') ? 'selected' : '' }}>Batch 2</option>
                    <option value="Batch 3" {{( request('angkatan') ==  'Batch 3') ? 'selected' : '' }}>Batch 3</option>
                    <option value="Batch 4" {{( request('angkatan') ==  'Batch 4') ? 'selected' : '' }}>Batch 4</option>
                    <option value="Batch 5" {{( request('angkatan') ==  'Batch 5') ? 'selected' : '' }}>Batch 5</option>
                    <option value="Batch 6" {{( request('angkatan') ==  'Batch 6') ? 'selected' : '' }}>Batch 6</option>
                    <option value="Batch 7" {{( request('angkatan') ==  'Batch 7') ? 'selected' : '' }}>Batch 7</option>
                    <option value="Batch 8" {{( request('angkatan') ==  'Batch 8') ? 'selected' : '' }}>Batch 8</option>
                    <option value="Batch 9" {{( request('angkatan') ==  'Batch 9') ? 'selected' : '' }}>Batch 9</option>
                    <option value="Batch 10" {{( request('angkatan') ==  'Batch 10') ? 'selected' : '' }}>Batch 10</option>
                </select>
            </div>
            <table class="table table-hover" border="1">
                <thead>
                    <tr>
                        <th class="text-center head_mentoring">Rank</th>
                        <th class="text-center head_mentoring">Nama Peserta</th>
                        <th class="text-center head_mentoring">Sekolah</th>
                        <th class="text-center head_mentoring">Program</th>
                        <th class="text-center head_mentoring">Angkatan</th>
                        <th class="text-center head_mentoring">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                    @foreach ($grade as $grades)
                        @php
                        $no++;
                        @endphp
                        <tr>
                            <td class="text-center"><b>{{ $no }}</b></td>
                            <td class="text-center">{{ $grades->name }}</td>
                            <td class="text-center">{{ $grades->sekolah}}</td>
                            <td class="text-center">{{ $grades->nama_program }}</td>
                            <td class="text-center">{{ $grades->angkatan }}</td>
                            <td class="text-center"><b>{{ $grades->total_grade }}</b></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('frontend.web.all') }}" class="d-flex justify-content-end" style="color: #48aa33"><b> All Leaderboard</b></a>
        </div>
    </section>
    <!-- ======= Portfolio Section ======= -->
    <div class="section-header" style="padding-top: 20px;">
        <h2 class="text-center">Portofolio Mentoring Udacoding</h2>
    </div>
    <section id="portfolio" style="background: #48aa33">
        <div class="container">
            <div class="owl-carousel testimonials-carousel">
                <div class="portofolio">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/fE5GcNSHdiw"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="portofolio">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TxHF1S3mb_w"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div class="portofolio">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K9TbnVz_MG8"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div class="portofolio">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/p8MIaOjgzK8"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div class="portofolio">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cZX1pP4vXMo"
                            allowfullscreen></iframe>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="text-center">Testimoni Peserta Mentoring</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <p>
                        <img src="{{url('frontend/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, fuga corporis! Doloribus non
                        debitis nisi? Molestiae itaque nulla iste, quasi reprehenderit illo autem odio aspernatur quos
                        incidunt, numquam ratione tenetur.
                        <img src="{{url('frontend/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
                    </p>
                    <img src="{{url('frontend/img/avatar.png') }}" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="{{url('frontend/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit praesentium, vitae quisquam
                        minus adipisci nisi beatae doloremque voluptatum quasi illo dolorum id autem aliquam officia
                        sunt, perferendis, nesciunt nemo esse?
                        <img src="{{url('frontend/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
                    </p>
                    <img src="{{url('frontend/img/avatar2.png') }}" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="{{url('frontend/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non qui error ea, fugiat eveniet culpa
                        magnam mollitia, aliquam asperiores expedita dolores illo? Atque architecto, magni maxime quae
                        sed reprehenderit ullam.
                        <img src="{{url('frontend/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
                    </p>
                    <img src="{{url('frontend/img/avatar3.png') }}" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="{{url('frontend/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid neque ut, expedita error
                        aperiam deleniti nulla optio similique numquam, esse nisi, impedit voluptate velit quam veniam
                        eveniet! Quibusdam, accusantium doloribus.
                        <img src="{{url('frontend/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
                    </p>
                    <img src="{{url('frontend/img/avatar04.png') }}" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="{{url('frontend/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos iure fuga, quo odio quia
                        voluptate unde tenetur ullam, pariatur repudiandae repellat rerum incidunt quisquam illo hic, et
                        at laudantium nesciunt.
                        <img src="{{url('frontend/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
                    </p>
                    <img src="{{url('frontend/img/avatar5.png') }}" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>

            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Call To Action Section ======= -->
    {{-- <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Call To Action</h3>
                    <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section --> --}}
    {{-- <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="form">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                            data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required"
                            data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>

                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>

                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

        </div>
    </section><!-- End Contact Section --> --}}

</main><!-- End #main -->
@endsection
