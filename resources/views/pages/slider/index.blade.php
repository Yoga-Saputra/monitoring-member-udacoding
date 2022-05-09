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
                    <th>Background</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($sliders as $slider)
                    @php
                        $no++ ;
                    @endphp
                    <tr>
                        <td style="padding: 13px 8px;">{{ $no }}</td>
                        <td><img class="img-thumbnail" width="100px" height="100px" src="{{ url('storage/app/bg/'.$slider->bg) }}" alt="">
                        </td>
                        <td style="padding: 8px; vertical-align: middle;">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu animated-fast fadeIn">
                                    <li>
                                        <a href="{{ route('slider.edit',$slider->id)}}" class="btn-edit"> <i class="fa fa-pencil"></i> Edit Slider </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('slider.delete',$slider->id) }}" method="POST"  enctype="multipart/form-data" >
                                            @csrf
                                            <button type="submit" class="launch center-block" onclick="return confirm('Yakin mau hapus {{ $slider->bg }}?')"><i class="dlt fa fa-trash"></i>Delete Slider</button>
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
                <h4 class="modal-title" id="exampleModalLabel">Pilih Gambar</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('slider.add') }}" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="bg">Pilih file background</label>
                        <input name="bg" type="file" value="{{ old('bg') }}" class="form-control @error('bg') is-invalid invalid @enderror"  id="bg" aria-describedby="namaHelp" placeholder="Masukan Nama Program" >
                        @error('bg')
                                <span class="invalid"><i>{{$message}}</i></span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.box -->
