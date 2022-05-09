@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 7</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week7.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam7">Exam 7</label>
                    <input name="exam7" type="number" value="{{ $total->exam_7 }}" class="form-control @error('exam7') is-invalid invalid @enderror" id="exam7">
                    @error('exam7')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam19">Submission 19</label>
                    <input name="subexam19" type="number" value="{{ $total->submission_19 }}" class="form-control @error('subexam19') is-invalid invalid @enderror" id="subexam19">
                    @error('subexam19')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam20">Submission 20</label>
                    <input name="subexam20" type="number" value="{{ $total->submission_20 }}" class="form-control @error('subexam20') is-invalid invalid @enderror" id="subexam20">
                    @error('subexam20')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam21">Submission 21</label>
                    <input name="subexam21" type="number" value="{{ $total->submission_21 }}" class="form-control @error('subexam21') is-invalid invalid @enderror" id="subexam21">
                    @error('subexam21')
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
