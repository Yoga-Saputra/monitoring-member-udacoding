
@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Report Program Kotlin </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Report</li>
    </ol>
</section>
@endsection
@section('modal')
<span>Batch : &nbsp;</span>
<select class="styp" type="text" name="angkatan"
        onchange="document.location.href = 'program-kotlin?angkatan=' + this.value+' ' ">
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
<a href="{{ route('report.kotlin') }}" class="btn btn-sm bg-green"><i class="fa fa-file-excel-o nav-icon"></i>&nbsp; Export</a>
<button type="button" class="btn btn-sm bg-green" data-toggle="modal" data-target="#exam1Modal"> <i
        class="fa fa-plus-circle"></i>Add
</button>
@endsection
@section('content')
{{--
--}}
<div class="box">

    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>peserta</th>
                    <th>Sekolah</th>
                    <th>Program</th>
                    <th>Angkatan</th>
                    <th>Total Grade</th>
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
                        <td style="padding: 13px 8px;">{{ $no }}</td>
                        <td style="padding: 13px 8px;">{{ $grades->name }}</td>
                        <td style="padding: 13px 8px;">{{ $grades->sekolah}}</td>
                        <td style="padding: 13px 8px;">{{ $grades->nama_program }}</td>
                        <td style="padding: 13px 8px;">{{ $grades->angkatan }}</td>
                        <td style="padding: 13px 8px;"><b>{{ $grades->total_grade }}</b></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

