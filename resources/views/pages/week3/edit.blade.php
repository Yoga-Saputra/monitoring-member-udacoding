@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 3</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week3.update', $total->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="participant_id" class=" form-control-label">Nama Peserta</label>
                    <select name="nama_peserta"
                        class="form-control @error('participant_id') is-invalid invalid @enderror" id="participant_id">
                        @foreach ($participant as $com)
                        <option value="{{$com->id}}" @if( $com->id ==old('program_id',$total->participant_id ))selected
                            @endif>
                            {{$com->name}}
                        </option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('participant_id') }}</p>
                </div>
                <div class="form-group">
                    <label for="exam3">Exam 3</label>
                    <input name="exam3" type="number" value="{{ $total->exam_3 }}" class="form-control @error('exam3') is-invalid invalid @enderror" id="exam3">
                    @error('exam3')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam7">Submission 7</label>
                    <input name="subexam7" type="number" value="{{ $total->submission_7 }}" class="form-control @error('subexam7') is-invalid invalid @enderror" id="subexam7">
                    @error('subexam7')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam8">Submission 8</label>
                    <input name="subexam8" type="number" value="{{ $total->submission_8 }}" class="form-control @error('subexam8') is-invalid invalid @enderror" id="subexam8">
                    @error('subexam8')
                        <span class="invalid"><i>Submission 3 harus berupa angka</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam9">Submission 9</label>
                    <input name="subexam9" type="number" value="{{ $total->submission_9 }}" class="form-control @error('subexam9') is-invalid invalid @enderror" id="subexam9">
                    @error('subexam9')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
