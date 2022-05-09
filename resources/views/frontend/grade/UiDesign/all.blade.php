@extends('frontend.master')
@section('content')
<main id="main">
    <section id="leaderboard">
        <div class="container">
            <div class="section-header">
                <h2 class="text-center">Leaderboard Mentoring Program Ui Design</h2>
            </div>
            <div class="batch d-flex justify-content-center pb-2 pt-2">
                <span>Batch : &nbsp;</span>
                <select class="styp" type="text" name="angkatan"
                        onchange="document.location.href = 'leaderboard-UiDesign-all?angkatan=' + this.value+' ' ">
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
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Nama Peserta</th>
                        <th>Sekolah</th>
                        <th>Program</th>
                        <th>Angkatan</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                    @foreach ($grade as $grades)
                    @php
                    $no++ ;
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
            <a href="{{ route('frontend.UiDesign') }}" class="btn btn-success btn-sm" >Back</a>
        </div>
    </section>
</main><!-- End #main -->
@endsection
