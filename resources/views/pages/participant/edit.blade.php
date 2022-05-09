@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Peserta </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Peserta</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
@endsection
@section('content')
<div class="card">
    <div class="box box-success">
        <form action="{{ route('participant.update', $participant->id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Nama Peserta</label>
                    <input name="name" type="text" value="{{ $participant->name }}"
                        class="form-control @error('name') is-invalid invalid @enderror" id="name"
                        placeholder="Enter email">
                    @error('name')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" value="{{ $participant->email }}"
                        class="form-control @error('email') is-invalid invalid @enderror" id="email"
                        placeholder="Enter email">
                    @error('email')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_tlp">No tlp</label>
                    <input name="no_tlp" type="text" value="{{ $participant->no_tlp }}"
                        class="form-control @error('no_tlp') is-invalid invalid @enderror" id="no_tlp"
                        placeholder="Enter No tlp">
                    @error('no_tlp')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sekolah">Sekolah</label>
                    <input name="sekolah" value="{{ $participant->sekolah }}" type="text"
                        class="form-control @error('sekolah') is-invalid invalid @enderror" id="sekolah"
                        aria-describedby="sekolahHelp" placeholder="Masukan Sekolah Anda">
                    @error('sekolah')
                    <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="angkatan_id">Angkatan</label>
                    <select name="angkatan" class="form-control @error('angkatan') is-invalid invalid @enderror"
                        id="angkatan">
                        <option value="Batch 1" @if($participant->angkatan == 'Batch 1' ) selected @endif>Batch 1
                        </option>
                        <option value="Batch 2" @if($participant->angkatan == 'Batch 2' ) selected @endif>Batch 2
                        </option>
                        <option value="Batch 3" @if($participant->angkatan == 'Batch 3' ) selected @endif>Batch 3
                        </option>
                        <option value="Batch 4" @if($participant->angkatan == 'Batch 4' ) selected @endif>Batch 4
                        </option>
                        <option value="Batch 5" @if($participant->angkatan == 'Batch 5' ) selected @endif>Batch 5
                        </option>
                        <option value="Batch 6" @if($participant->angkatan == 'Batch 6' ) selected @endif>Batch 6
                        </option>
                        <option value="Batch 7" @if($participant->angkatan == 'Batch 7' ) selected @endif>Batch 7
                        </option>
                        <option value="Batch 8" @if($participant->angkatan == 'Batch 8' ) selected @endif>Batch 8
                        </option>
                        <option value="Batch 9" @if($participant->angkatan == 'Batch 9' ) selected @endif>Batch 9
                        </option>
                        <option value="Batch 10" @if($participant->angkatan == 'Batch 10' ) selected @endif>Batch 10
                        </option>
                        {{--  @foreach ($angkatan as $ang)
                      <option  value="{{$ang->id}}"@if( $ang->id == old('angkatan_id',$participant->angkatan_id
                        ))selected @endif>
                        {{$ang->nama_angkatan}}
                        </option>
                        @endforeach --}}
                    </select>
                    <p class="text-danger">{{ $errors->first('angkatan_id') }}</p>
                </div>
                <div class="form-group">
                    <label for="program_id">Program</label>
                    <select name="program" class="form-control @error('program_id') is-invalid invalid @enderror"
                        id="program_id">
                        @foreach ($program as $prog)
                        <option value="{{$prog->id}}" @if( $prog->id == old('program_id',$participant->program_id ))        selected    @endif>
                            {{$prog->nama_program}}
                        </option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('program_id') }}</p>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
