@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 2</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week2.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam2">Exam 2</label>
                    <input name="exam2" type="number" value="{{ $total->exam_2 }}" class="form-control @error('exam2') is-invalid invalid @enderror" id="exam2">
                    @error('exam2')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam4">Submission 4</label>
                    <input name="subexam4" type="number" value="{{ $total->submission_4 }}" class="form-control @error('subexam4') is-invalid invalid @enderror" id="subexam4">
                    @error('subexam4')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam5">Submission 5</label>
                    <input name="subexam5" type="number" value="{{ $total->submission_5 }}" class="form-control @error('subexam5') is-invalid invalid @enderror" id="subexam5">
                    @error('subexam5')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam6">Submission 6</label>
                    <input name="subexam6" type="number" value="{{ $total->submission_6 }}" class="form-control @error('subexam6') is-invalid invalid @enderror" id="subexam6">
                    @error('subexam6')
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
