@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 6</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week6.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam6">Exam 6</label>
                    <input name="exam6" type="number" value="{{ $total->exam_6 }}" class="form-control @error('exam6') is-invalid invalid @enderror" id="exam6">
                    @error('exam6')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam16">Submission 16</label>
                    <input name="subexam16" type="number" value="{{ $total->submission_16 }}" class="form-control @error('subexam16') is-invalid invalid @enderror" id="subexam16">
                    @error('subexam16')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam17">Submission 17</label>
                    <input name="subexam17" type="number" value="{{ $total->submission_17 }}" class="form-control @error('subexam17') is-invalid invalid @enderror" id="subexam17">
                    @error('subexam17')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam18">Submission 18</label>
                    <input name="subexam18" type="number" value="{{ $total->submission_18 }}" class="form-control @error('subexam18') is-invalid invalid @enderror" id="subexam18">
                    @error('subexam18')
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
