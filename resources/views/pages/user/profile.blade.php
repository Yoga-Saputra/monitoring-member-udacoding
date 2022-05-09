@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Profile </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profile</li>
    </ol>
</section>
@endsection
@section('profile')
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-2">
                <div class="box box-info">
                    <img src="{{ asset ('storage/app/user_pic/'. auth()->user()->image) }}" class="img-responsive" alt="Belum ada gambar">
                </div>
            </div>
            <div class="col-md-5">
                <div class="box box-info">
                    {{-- <img src="{{ asset ('storage/app/user_pic/'. auth()->user()->image) }}" class="img-responsive" alt="Belum ada gambar" style="    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    padding-top: 10px;"> --}}
                    <form class="form-horizontal" action="{{ route('uploud_picture') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="col-sm-1 control-label">Foto</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" name="image">
                                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        Besar file harus 500 kb
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="box box-info">
                    <form class="form-horizontal" action="{{ route('changepassword.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <label class="form-control">{{ $user->name}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <label class="form-control">{{ $user->email}}</label>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('oldpassword') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Password Lama</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="oldpassword"
                                        placeholder="Masukkan Password Lama">
                                    @if ($errors->has('oldpassword'))
                                    <span class="help-block">
                                        {{ $errors->first('oldpassword') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Password Baru</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="new_password"
                                        placeholder="Masukkan Password Baru">
                                    @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        {{ $errors->first('new_password') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Masukkan Konfirmasi Password">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
@endsection
