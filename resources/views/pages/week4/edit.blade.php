@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 4</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week4.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam4">Exam 4</label>
                    <input name="exam4" type="number" value="{{ $total->exam_4 }}" class="form-control @error('exam4') is-invalid invalid @enderror" id="exam4">
                    @error('exam4')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam10">Submission 10</label>
                    <input name="subexam10" type="number" value="{{ $total->submission_10 }}" class="form-control @error('subexam10') is-invalid invalid @enderror" id="subexam10">
                    @error('subexam10')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam11">Submission 11</label>
                    <input name="subexam11" type="number" value="{{ $total->submission_11 }}" class="form-control @error('subexam11') is-invalid invalid @enderror" id="subexam11">
                    @error('subexam11')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam12">Submission 12</label>
                    <input name="subexam12" type="number" value="{{ $total->submission_12 }}" class="form-control @error('subexam12') is-invalid invalid @enderror" id="subexam12">
                    @error('subexam12')
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
