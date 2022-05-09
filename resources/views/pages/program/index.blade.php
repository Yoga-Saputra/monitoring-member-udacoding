@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Program </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Program</li>
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
                    <th>Nama Program</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($program as $programs)
                    @php
                        $no++ ;
                    @endphp
                    <tr>
                        <td style="padding: 13px 8px;">{{ $no }}</td>
                        <td style="padding: 13px 8px;">{{ $programs->nama_program }}</td>
                        <td style="padding: 8px; vertical-align: middle;">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action
                                    <span class="caret"></span>
                                </button>

                                    <ul class="dropdown-menu animated-fast fadeIn">
                                        <li>
                                            <a href="{{ route('program.edit',$programs->id)}}" class="btn-edit"> <i class="fa fa-pencil"></i> Edit Program </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('program.delete',$programs->id) }}" method="POST"  enctype="multipart/form-data" >
                                                @csrf
                                                <button type="submit" class="launch center-block" onclick="return confirm('Yakin mau hapus {{ $programs->nama }}?')"><i class="dlt fa fa-trash"></i>Delete Program</button>
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
                <form action="{{ route('program.tambah') }}" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Nama Program</label>
                        <input name="nama_program" type="text" value="{{ old('nama_program') }}" class="form-control @error('nama_program') is-invalid invalid @enderror"  id="nama" aria-describedby="namaHelp" placeholder="Masukan Nama Program" >
                        @error('nama_program')
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
