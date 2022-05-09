@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> User </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> User</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
@endsection
@section('content')
<div class="car">
    <div class="box box-success">
        <form action="{{ route('user.update', $users->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class=" form-control-label">Nama</label>
                    <label class="form-control">{{ $users->name}}</label>
                </div>
                <div class="form-group">
                    <label for="email" class=" form-control-label">Email</label>
                    <label class="form-control">{{ $users->email}}</label>
                </div>
                <div class="form-group">
                    <label for="email" class=" form-control-label">Level</label>
                    <label class="form-control">{{ $users->level}}</label>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <span>Leave empty if you dont want to change</span>
                        <input type="password" class="form-control" name="password"
                            placeholder="Change Password">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                </div>
            </div>

            <div class="box-footer">
                <a href="{{ route('user') }}" class="btn btn-warning float-left">Back</a>
                <button type="submit" class="btn btn-success " style="float: right">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
