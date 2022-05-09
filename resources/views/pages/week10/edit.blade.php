@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 10</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week10.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam10">Exam 10</label>
                    <input name="exam10" type="number" value="{{ $total->exam_10 }}" class="form-control @error('exam10') is-invalid invalid @enderror" id="exam10">
                    @error('exam10')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam28">Submission 28</label>
                    <input name="subexam28" type="number" value="{{ $total->submission_28 }}" class="form-control @error('subexam28') is-invalid invalid @enderror" id="subexam28">
                    @error('subexam28')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam29">Submission 29</label>
                    <input name="subexam29" type="number" value="{{ $total->submission_29 }}" class="form-control @error('subexam29') is-invalid invalid @enderror" id="subexam29">
                    @error('subexam29')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam30">Submission 30</label>
                    <input name="subexam30" type="number" value="{{ $total->submission_30 }}" class="form-control @error('subexam30') is-invalid invalid @enderror" id="subexam30">
                    @error('subexam30')
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
