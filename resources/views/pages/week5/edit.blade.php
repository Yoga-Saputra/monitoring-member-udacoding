@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 5</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('week5.update', $total->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exam5">Exam 5</label>
                    <input name="exam5" type="number" value="{{ $total->exam_5 }}" class="form-control @error('exam5') is-invalid invalid @enderror" id="exam5">
                    @error('exam5')
                        <span class="text-danger"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam13">Submission 13</label>
                    <input name="subexam13" type="number" value="{{ $total->submission_13 }}" class="form-control @error('subexam13') is-invalid invalid @enderror" id="subexam13">
                    @error('subexam13')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam14">Submission 14</label>
                    <input name="subexam14" type="number" value="{{ $total->submission_14 }}" class="form-control @error('subexam14') is-invalid invalid @enderror" id="subexam14">
                    @error('subexam14')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subexam15">Submission 15</label>
                    <input name="subexam15" type="number" value="{{ $total->submission_15 }}" class="form-control @error('subexam15') is-invalid invalid @enderror" id="subexam15">
                    @error('subexam15')
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
