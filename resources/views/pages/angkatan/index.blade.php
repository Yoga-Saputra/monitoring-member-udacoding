
@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Angkatan </h1> <small>Manage Angkatan</small>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Angkatan</li>
    </ol>
</section>
@endsection
@section('modal')
<button type="button" class="btn btn-xs bg-green" data-toggle="modal" data-target="#angkatanModal"> <i class="fa fa-plus-circle"></i>Add 
</button> 
@endsection
@section('content')
{{--  
--}}
<div class="box">

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Angkatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($angkatan as $angkatans)
                @php
                    $no++ ;
                @endphp
                <tr>
                    <td style="padding: 13px 8px;">{{ $no }}</td>
                    <td style="padding: 13px 8px;">{{ $angkatans->nama_angkatan }}</td>
                    <td style="padding: 8px; vertical-align: middle;">
                        <div class="dropdown"> 
                            <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action 
                                <span class="caret"></span> 
                            </button>
                            <ul class="dropdown-menu animated-fast fadeIn">
                                <li> 
                                    <a href="{{ route('angkatan.edit',$angkatans->id)}}" class="btn-edit"> <i class="fa fa-pencil"></i> Edit Angkatan </a> 
                                </li>
                                <li> 
                                    <form action="{{ route('angkatan.delete',$angkatans->id) }}" method="POST"  enctype="multipart/form-data" >
                                        @csrf
                                        <button type="submit" class="launch center-block" onclick="return confirm('Yakin mau hapus {{ $angkatans->nama }}?')"><i class="dlt fa fa-trash"></i>Delete Angkatan</button>
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
<script type="text/javascript">
    function confirmdelete(id){
        var pesan ='yakin mau dihapus id '+id+'??';
        if(confirm(pesan)){
            window.location='{{ url("angkatan/delete") }}/'+id;
        }else{
            return false;
        }
    }
</script>
<div class="modal fade" id="angkatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Masukan Data Dibawah Ini</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('angkatan.tambah') }}" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Nama Program</label>
                        <input name="nama_angkatan" type="text" value="{{ old('nama_angkatan') }}" class="form-control @error('nama_angkatan') is-invalid invalid @enderror"  id="nama" aria-describedby="namaHelp" placeholder="Masukan Nama Program" >
                        @error('nama_angkatan')
                                <span class="invalid"><i>nama angkatan tidak bole integer</i></span>
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
@endsection

