@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade Week 1 </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Grade</li>
    </ol>
</section>
@endsection
@section('modal')
    @if (Auth::user()->level == 'admin')
        <a href="{{ route('week1.store') }}" class="btn btn-sm bg-green"><i class="fa fa-plus nav-icon"></i>&nbsp; Add</a>
    @endif
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
                    <th>Program</th>
                    <th>Angkatan</th>
                    <th>Exam 1</th>
                    <th>Submission 1</th>
                    <th>Submission 2</th>
                    <th>Submission 3</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 0;
                @endphp
                @foreach ($total as $totals)
                @php
                $no++;
                @endphp
                <tr>
                    <td style="padding: 13px 8px;">{{ $no }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->participant->name }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->participant->program->nama_program }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->participant->angkatan }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->exam_1 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_1 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_2 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_3 }}</td>
                    <td style="padding: 13px 8px;"><b>{{ $totals->total_grade}}</b></td>
                    <td style="padding: 8px; vertical-align: middle;">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false"> Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu animated-fast fadeIn">
                                <li>
                                    <a href="{{ route('week1.edit', $totals->id) }}" class="btn-edit"> <i
                                            class="fa fa-pencil"></i>Edit Grade </a>
                                </li>
                                <li>
                                    <form action="{{ route('week1.delete', $totals->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="launch center-block"
                                            onclick="return confirm('Yakin mau hapus {{ $totals->participant->name }} ?')"><i
                                                class="dlt fa fa-trash"></i>Delete Grade</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function confirmdelete(id) {
            var pesan = 'yakin mau dihapus id ' + id + '??';
            if (confirm(pesan)) {
                window.location = '{{ url("grade/week1/delete") }}/' + id;
            } else {
                return false;
            }
        }

    </script>
    <div class="modal fade" id="exam1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Masukan Data Dibawah Ini</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('week1.tambah') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="participant_id" class=" form-control-label">Nama Peserta</label>
                            {{-- <input type="text" name="nama_peserta" class="form-control @error('participant_id') is-invalid invalid @enderror" id="nama_peserta" placeholder="Masukan Nama Peserta">
                            <div id="pesertaList"></div> --}}
                            <select name="nama_peserta"
                                class="form-control @error('participant_id') is-invalid invalid @enderror"
                                id="participant_id">
                                @foreach ($participant as $com)
                                <option value="{{$com->id}}">{{$com->name}}</option>
                                @endforeach
                            </select>
                            {{--  <p class="text-danger">{{ $errors->first('participant_id') }}</p>  --}}
                        </div>
                        <div class="form-group">
                            <label for="nama">Exam 1</label>
                            <input name="exam1" type="number" value="{{ old('exam1') }}"
                                class="form-control @error('exam1') is-invalid invalid @enderror" id="exam1"
                                aria-describedby="namaHelp" placeholder="Masukan Nama Program">
                            @error('exam1')
                            <span class="invalid"><i>Exam 2 harus berupa angka</i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subexam1">Submission 1</label>
                            <input name="subexam1" type="number" value="{{ old('subexam1') }}"
                                class="form-control @error('subexam1') is-invalid invalid @enderror" id="subexam1"
                                aria-describedby="namaHelp" placeholder="Masukan Nama Program">
                            @error('subexam1')
                            <span class="invalid"><i>Sub Exam 2 harus berupa angka</i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subexam2">Submission 2</label>
                            <input name="subexam2" type="number" value="{{ old('subexam2') }}"
                                class="form-control @error('subexam2') is-invalid invalid @enderror" id="subexam2"
                                aria-describedby="namaHelp" placeholder="Masukan Nama Program">
                            @error('subexam2')
                            <span class="invalid"><i>Sub Exam 2 harus berupa angka</i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subexam3">Submission 3</label>
                            <input name="subexam3" type="number" value="{{ old('subexam3') }}"
                                class="form-control @error('subexam3') is-invalid invalid @enderror" id="subexam3"
                                aria-describedby="subexam3Help" placeholder="Masukan subexam3 Program">
                            @error('subexam3')
                            <span class="invalid"><i>Sub Exam 2 harus berupa angka</i></span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection



    {{--  <td style="padding: 13px 8px;">{{ $week2s->total_grade }}</td>
    <td style="padding: 13px 8px;">{{ $week1s->total_grade + $week2s->total_grade }}</td> --}}
