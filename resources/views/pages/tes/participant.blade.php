@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Peserta </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Peserta</li>
    </ol>
</section>
@endsection
@section('modal')
<button type="button" class="btn btn-xs bg-green" data-toggle="modal" data-target="#pesertaModal"> <i class="fa fa-plus-circle"></i>Add 
</button> 
@endsection
@section('content')
<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Sekolah</th>
                <th>Angkatan</th>
                <th>Program</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 0;
            @endphp
            @foreach ($participant as $participants)
            @php
            $no++ ;
            @endphp
            <tr>
                <td style="padding: 13px 8px;">{{ $no }}</td>
                <td style="padding: 13px 8px;">{{ $participants->name }}</td>
                <td style="padding: 13px 8px;">{{ $participants->sekolah }}</td>
                <td style="padding: 13px 8px;">{{ $participants->angkatan->nama_angkatan }}</td>
                <td style="padding: 13px 8px;">{{ $participants->program->nama_program }}</td>
                <td style="padding: 8px; vertical-align: middle;">
                    <div class="dropdown"> 
                        <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action 
                            <span class="caret"></span> 
                        </button>
                        <ul class="dropdown-menu animated-fast fadeIn">
                            <li> 
                                <a href="#" class="btn-edit"> <i class="fa fa-pencil"></i> Edit Promo </a> 
                            </li>
                            <li> 
                                <a href="#" class="btn-delete"> <i class="fa fa-trash"></i> Delete Promo </a> 
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="pesertaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Masukan Data Dibawah Ini</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/employee') }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukan Nama Anda" >
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email Anda">
                    </div>

                    <div class="form-group">
                        <label for="company" class=" form-control-label">Company</label>
                        <select name="company" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($angkatan as $com)
                            <option  value="{{$com->id}}">{{ ucfirst($com->nama_angkatan) }}</option>
                            @endforeach
                        </select>
                        @error('angkatan')
                            <span class="invalid"><i>{{$message}}</i></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Company</label>
                        <select name="company" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($program as $com)
                            <option  value="{{$com->id}}">{{$com->nama_program}}</option>
                            @endforeach
                        </select>
                        @error('program')
                            <span class="invalid"><i>{{$message}}</i></span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- /.box -->
