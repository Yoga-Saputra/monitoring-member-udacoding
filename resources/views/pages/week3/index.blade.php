@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade Week 3 </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Grade</li>
    </ol>
</section>
@endsection
{{--  @section('modal')
<button type="button" class="btn btn-xs bg-green" data-toggle="modal" data-target="#exam1Modal"> <i
        class="fa fa-plus-circle"></i>Add
</button>
@endsection  --}}
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
                    <th>Exam 3</th>
                    <th>Submission 7</th>
                    <th>Submission 8</th>
                    <th>Submission 9</th>
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
                    <td style="padding: 13px 8px;">{{ $totals->exam_3 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_7 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_8 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_9 }}</td>
                    <td style="padding: 13px 8px;"><b>{{ $totals->total_grade}}</b></td>
                    <td style="padding: 8px; vertical-align: middle;">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false"> Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu animated-fast fadeIn">
                                <li>
                                    <a href="{{ route('week3.edit', $totals->id) }}" class="btn-edit"> <i
                                            class="fa fa-pencil"></i>Input Nilai</a>
                                </li>
                                {{--  <li>
                                    <form action="{{ route('week3.delete', $totals->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="launch center-block"
                                            onclick="return confirm('Yakin mau hapus {{ $totals->participant->name }} ?')"><i
                                                class="dlt fa fa-trash"></i>Delete Grade</button>
                                    </form>
                                </li>  --}}
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{--  <script type="text/javascript">
        function confirmdelete(id) {
            var pesan = 'yakin mau dihapus id ' + id + '??';
            if (confirm(pesan)) {
                window.location = '{{ url("grade/week3/delete") }}/' + id;
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
                    <form action="{{ route('week3.tambah') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="participant_id" class=" form-control-label">Nama Peserta</label>
                            <select name="nama_peserta" class="form-control @error('participant_id') is-invalid invalid @enderror" id="participant_id">
                                @foreach ($participant as $com)
                                <option value="{{$com->id}}">{{$com->name}}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('participant_id') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="nama">Exam 3</label>
                            <input name="exam3" type="number" value="{{ old('exam3') }}" class="form-control @error('exam3') is-invalid invalid @enderror" id="nama" aria-describedby="namaHelp">
                            @error('exam3')
                            <span class="invalid"><i>{{$message}}/i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Sub Exam 5</label>
                            <input name="subexam5" type="number" value="{{ old('subexam5') }}"
                                class="form-control @error('subexam5') is-invalid invalid @enderror" id="nama"
                                aria-describedby="namaHelp">
                            @error('subexam5')
                            <span class="invalid"><i>Sub {{$message}}/i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Sub Exam 6</label>
                            <input name="subexam6" type="number" value="{{ old('subexam6') }}"
                                class="form-control @error('subexam6') is-invalid invalid @enderror" id="nama"
                                aria-describedby="namaHelp">
                            @error('subexam6')
                            <span class="invalid"><i>{{$message}}</i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Sub Exam 7</label>
                            <input name="subexam7" type="number" value="{{ old('subexam7') }}"
                                class="form-control @error('subexam7') is-invalid invalid @enderror" id="nama"
                                aria-describedby="namaHelp">
                            @error('subexam7')
                            <span class="invalid"><i>{{$message}}</i></span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  --}}
    @endsection

    {{--  <td style="padding: 13px 8px;">{{ $week2s->total_grade }}</td>
    <td style="padding: 13px 8px;">{{ $week1s->total_grade + $week2s->total_grade }}</td> --}}
