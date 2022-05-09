@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Program </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Program</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="link">Portofolio</label>
                    <input name="link" type="text" value="{{ $portofolio->link }}" class="form-control" id="link" placeholder="masukan nama program">
                    @error('link')
                    <span class="invalid"><i>Link tidak bole kosong</i></span>
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
