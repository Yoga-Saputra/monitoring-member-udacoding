@extends('frontend.master')
@section('content')
<section id="intro">

    <div class="intro-content">
        <h1>Mentoring <span>Program</span></h1>
    </div>

    <div id="intro-carousel" class="owl-carousel">
        @foreach ($sliders as $slider)
            <img class="item" src="{{ url('storage/app/bg/'.$slider->bg) }}" style="height: 87vh" alt="">
        @endforeach
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section>

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
            <span></span>
            <div class="batch d-flex justify-content-end pb-2 pt-2">
                <span>Batch : &nbsp;</span>
                <select class="styp" type="text" name="angkatan"
                        onchange="document.location.href = ' leaderboard-flutter?angkatan=' + this.value+' ' ">
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
            <a href="{{ route('frontend.flutter.all') }}" class="d-flex justify-content-end" style="color: #48aa33"><b> All Leaderboard</b></a>
        </div>
    </section>


</main><!-- End #main -->
@endsection
