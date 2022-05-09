@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Program </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-calendar"></i> Angkatan</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('angkatan.update', $angkatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="nama_angkatan">Nama Angkatan</label>
                    <input name="nama_angkatan" type="text" value="{{ $angkatan->nama_angkatan }}" class="form-control" id="nama_angkatan" placeholder="Enter email">
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
