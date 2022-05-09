@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Grade </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Week 2</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
                    <form action="{{ route('week1.tambah') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="participant_id" class=" form-control-label">Nama Peserta</label>
                                <select class="form-control searchParticipant" id="participantId" onchange="getProgram();" name="nama_peserta" style="width: 100%;"></select>
                                <p class="text-danger">{{ $errors->first('participant_id') }}</p>
                            </div>
                            <div id="div1">
                            </div>
                            {{-- <div class="form-group">
                                <label for="nama">Program</label>
                                <input name="exam1" type="number" value="{{ old('exam1') }}"
                                    class="form-control @error('exam1') is-invalid invalid @enderror" id="exam1"
                                    aria-describedby="namaHelp" placeholder="Masukan Nama Program">
                                @error('exam1')
                                <span class="invalid"><i>Exam 2 harus berupa angka</i></span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="nama">Exam 1</label>
                                <input name="exam1" type="number" value="{{ old('exam1') }}"
                                    class="form-control @error('exam1') is-invalid invalid @enderror" id="exam1"
                                    aria-describedby="namaHelp" placeholder="Masukan Nama Program">
                                @error('exam1')
                                <span class="invalid"><i>Exam 2 harus berupa angka</i></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subexam1">Submission 1</label>
                                <input name="subexam1" type="number" value="{{ old('subexam1') }}"
                                    class="form-control @error('subexam1') is-invalid invalid @enderror" id="subexam1"
                                    aria-describedby="namaHelp" placeholder="Masukan Nama Program">
                                @error('subexam1')
                                <span class="invalid"><i>Sub Exam 2 harus berupa angka</i></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subexam2">Submission 2</label>
                                <input name="subexam2" type="number" value="{{ old('subexam2') }}"
                                    class="form-control @error('subexam2') is-invalid invalid @enderror" id="subexam2"
                                    aria-describedby="namaHelp" placeholder="Masukan Nama Program">
                                @error('subexam2')
                                <span class="invalid"><i>Sub Exam 2 harus berupa angka</i></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subexam3">Submission 3</label>
                                <input name="subexam3" type="number" value="{{ old('subexam3') }}"
                                    class="form-control @error('subexam3') is-invalid invalid @enderror" id="subexam3"
                                    aria-describedby="subexam3Help" placeholder="Masukan subexam3 Program">
                                @error('subexam3')
                                <span class="invalid"><i>Sub Exam 2 harus berupa angka</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
    </div>
</div>

@endsection

