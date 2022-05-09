@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 12</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week12.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam12">Exam 12</label>
                    <input name="exam12" type="number" value="{{ $total->exam_12 }}" class="form-control @error('exam12') is-invalid invalid @enderror" id="exam12">
                    @error('exam12')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam34">Submission 34</label>
                    <input name="subexam34" type="number" value="{{ $total->submission_34 }}" class="form-control @error('subexam34') is-invalid invalid @enderror" id="subexam34">
                    @error('subexam34')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam35">Submission 35</label>
                    <input name="subexam35" type="number" value="{{ $total->submission_35 }}" class="form-control @error('subexam35') is-invalid invalid @enderror" id="subexam35">
                    @error('subexam35')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam36">Submission 36</label>
                    <input name="subexam36" type="number" value="{{ $total->submission_36 }}" class="form-control @error('subexam36') is-invalid invalid @enderror" id="subexam36">
                    @error('subexam36')
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
