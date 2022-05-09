@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 11</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week11.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam11">Exam 11</label>
                    <input name="exam11" type="number" value="{{ $total->exam_11 }}" class="form-control @error('exam11') is-invalid invalid @enderror" id="exam11">
                    @error('exam11')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam31">Submission 31</label>
                    <input name="subexam31" type="number" value="{{ $total->submission_31 }}" class="form-control @error('subexam31') is-invalid invalid @enderror" id="subexam31">
                    @error('subexam31')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam32">Submission 32</label>
                    <input name="subexam32" type="number" value="{{ $total->submission_32 }}" class="form-control @error('subexam32') is-invalid invalid @enderror" id="subexam32">
                    @error('subexam32')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam33">Submission 33</label>
                    <input name="subexam33" type="number" value="{{ $total->submission_33 }}" class="form-control @error('subexam33') is-invalid invalid @enderror" id="subexam33">
                    @error('subexam33')
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
