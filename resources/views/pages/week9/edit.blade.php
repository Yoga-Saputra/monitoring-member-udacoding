@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 9</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week9.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam9">Exam 9</label>
                    <input name="exam9" type="number" value="{{ $total->exam_9 }}" class="form-control @error('exam9') is-invalid invalid @enderror" id="exam9">
                    @error('exam9')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam25">Submission 25</label>
                    <input name="subexam25" type="number" value="{{ $total->submission_25 }}" class="form-control @error('subexam25') is-invalid invalid @enderror" id="subexam25">
                    @error('subexam25')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam26">Submission 26</label>
                    <input name="subexam26" type="number" value="{{ $total->submission_26 }}" class="form-control @error('subexam26') is-invalid invalid @enderror" id="subexam26">
                    @error('subexam26')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam27">Submission 27</label>
                    <input name="subexam27" type="number" value="{{ $total->submission_27 }}" class="form-control @error('subexam27') is-invalid invalid @enderror" id="subexam27">
                    @error('subexam27')
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
