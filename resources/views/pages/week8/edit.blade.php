@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 8</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week8.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam8">Exam 8</label>
                    <input name="exam8" type="number" value="{{ $total->exam_8 }}" class="form-control @error('exam8') is-invalid invalid @enderror" id="exam8">
                    @error('exam8')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam22">Submission 22</label>
                    <input name="subexam22" type="number" value="{{ $total->submission_22 }}" class="form-control @error('subexam22') is-invalid invalid @enderror" id="subexam22">
                    @error('subexam22')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam23">Submission 23</label>
                    <input name="subexam23" type="number" value="{{ $total->submission_23 }}" class="form-control @error('subexam23') is-invalid invalid @enderror" id="subexam23">
                    @error('subexam23')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam24">Submission 24</label>
                    <input name="subexam24" type="number" value="{{ $total->submission_24 }}" class="form-control @error('subexam24') is-invalid invalid @enderror" id="subexam24">
                    @error('subexam24')
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
