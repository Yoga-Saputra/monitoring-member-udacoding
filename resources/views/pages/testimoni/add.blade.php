@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Testimoni </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Testimoni</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
                    <form action="{{ route('testimoni.tambah') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="participant_id" class=" form-control-label">Nama Peserta</label>
                                <select class="form-control searchParticipant" id="participantId"  name="nama_peserta" style="width: 100%;"></select>
                                <p class="text-danger">{{ $errors->first('participant_id') }}</p>
                            </div>
                            <div id="div1">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid invalid @enderror" id="deskripsi" rows="3" placeholder="Silahkan masukan testimoni anda"></textarea>
                            </div>
                            @error('deskripsi')
                                <span class="invalid">{{ $errors->first('deskripsi') }}</span>
                            @enderror   
                        </div>
                        <div class="modal-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
    </div>
</div>

@endsection

