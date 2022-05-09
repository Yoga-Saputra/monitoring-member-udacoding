@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Portofolio </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Portofolio</li>
    </ol>
</section>
@endsection
@section('modal')
<button type="button" class="btn btn-sm bg-green" data-toggle="modal" data-target="#programModal"> <i class="fa fa-plus-circle"></i>Add
</button>
@endsection
@section('content')
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Portofolio</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($portofolios as $portofolio)
                    @php
                        $no++ ;
                    @endphp
                    <tr>
                        <td style="padding: 13px 8px;">{{ $no }}</td>
                        <td style="padding: 13px 8px;">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $portofolio->link }}"
                                    allowfullscreen></iframe>
                            </div>
                        </td>
                        <td style="padding: 8px; vertical-align: middle;">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action
                                    <span class="caret"></span>
                                </button>
                                    <ul class="dropdown-menu animated-fast fadeIn">
                                        <li>
                                            <a href="{{ route('portofolio.edit',$portofolio->id)}}" class="btn-edit"> <i class="fa fa-pencil"></i> Edit Link </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('program.delete',$portofolio->id) }}" method="POST"  enctype="multipart/form-data" >
                                                @csrf
                                                <button type="submit" class="launch center-block" onclick="return confirm('Yakin mau hapus {{ $portofolio->link }}?')"><i class="dlt fa fa-trash"></i>Delete Link</button>
                                            </form>
                                        </li>
                                    </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
@endsection
<div class="modal fade" id="programModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Masukan Data Dibawah Ini</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('portofolio.add') }}" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input name="link" type="text" value="{{ old('link') }}" class="form-control @error('link') is-invalid invalid @enderror"  id="link" aria-describedby="namaHelp" placeholder="Masukan Nama Program" >
                        @error('link')
                                <span class="invalid"><i>{{$message}}</i></span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.box -->
