@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Slider </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i>Slider</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="bg">Pilih Gambar</label>
                    <input name="bg" type="file" value="{{ $slider->bg }}" class="form-control" id="bg" placeholder="masukan nama program">
                    @error('bg')
                    <span class="invalid"><i>Nama program tidak boleh kosong</i></span>
                    @enderror
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
