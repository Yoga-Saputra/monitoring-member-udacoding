@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade Week 7 </h1>
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
                    <th>Exam 7</th>
                    <th>Submission 19</th>
                    <th>Submission 20</th>
                    <th>Submission 21</th>
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
                    <td style="padding: 13px 8px;">{{ $totals->exam_7 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_19 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_20 }}</td>
                    <td style="padding: 13px 8px;">{{ $totals->submission_21 }}</td>
                    <td style="padding: 13px 8px;"><b>{{ $totals->total_grade}}</b></td>
                    <td style="padding: 8px; vertical-align: middle;">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false"> Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu animated-fast fadeIn">
                                <li>
                                    <a href="{{ route('week7.edit', $totals->id) }}" class="btn-edit"> <i
                                            class="fa fa-pencil"></i>Input Nilai </a>
                                </li>
                                {{--  <li>
                                    <form action="{{ route('week7.delete', $totals->id) }}" method="POST"
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
                window.location = '{{ url("grade/week7/delete") }}/' + id;
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
                    <h7 class="modal-title" id="exampleModalLabel">Masukan Data Dibawah Ini</h7>
                </div>
                <div class="modal-body">
                    <form action="{{ route('week7.tambah') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="exam7">Exam 7</label>
                            <input name="exam7" type="number" value="{{ old('exam7') }}" class="form-control @error('exam7') is-invalid invalid @enderror" id="exam7" aria-describedby="exam7Help">
                            @error('exam7')
                            <span class="invalid"><i>{{$message}}/i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subexam8">Sub Exam 8</label>
                            <input name="subexam8" type="number" value="{{ old('subexam8') }}"
                                class="form-control @error('subexam8') is-invalid invalid @enderror" id="subexam8"
                                aria-describedby="subexam8Help">
                            @error('subexam8')
                            <span class="invalid"><i>Sub {{$message}}/i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subexam9">Sub Exam 9</label>
                            <input name="subexam9" type="number" value="{{ old('subexam9') }}"
                                class="form-control @error('subexam9') is-invalid invalid @enderror" id="subexam9"
                                aria-describedby="subexam9Help">
                            @error('subexam9')
                            <span class="invalid"><i>{{$message}}</i></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subexam19">Sub Exam 19</label>
                            <input name="subexam19" type="number" value="{{ old('subexam19') }}"
                                class="form-control @error('subexam19') is-invalid invalid @enderror" id="subexam19"
                                aria-describedby="subexam19Help">
                            @error('subexam19')
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
