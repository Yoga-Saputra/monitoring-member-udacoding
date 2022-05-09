@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 2</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week1.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam1">Exam 1</label>
                    <input name="exam1" type="number" value="{{ $total->exam_1 }}" class="form-control @error('exam1') is-invalid invalid @enderror" id="exam1">
                    @error('subexam1')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam1">Submission 1</label>
                    <input name="subexam1" type="number" value="{{ $total->submission_1 }}" class="form-control @error('subexam1') is-invalid invalid @enderror" id="subexam1">
                    @error('subexam1')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam2">Submission 2</label>
                    <input name="subexam2" type="number" value="{{ $total->submission_2 }}" class="form-control @error('subexam2') is-invalid invalid @enderror" id="subexam2">
                    @error('subexam2')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam3">Submission 3</label>
                    <input name="subexam3" type="number" value="{{ $total->submission_3 }}" class="form-control @error('subexam3') is-invalid invalid @enderror" id="subexam3">
                    @error('subexam3')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
