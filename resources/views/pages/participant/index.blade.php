@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> Peserta </h1><small>Manage Peserta</small>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Peserta</li>
    </ol>
</section>
@endsection

@section('modal')
    <a href="{{ url('uploads/format/format_import_data.xlsx') }}" class="btn btn-sm bg-green"><i class="fa fa-download"></i>&nbsp; Download Format Import</a>
    <button type="button" class="btn btn-sm bg-green" data-toggle="modal" data-target="#import"> <i class="fa fa-file-excel-o nav-icon"></i> &nbsp; Import</button>
    <a href="{{ route('participants.export.excel') }}" class="btn btn-sm bg-green"><i class="fa fa-file-excel-o nav-icon"></i>&nbsp; Export</a>
    <button type="button" class="btn btn-sm bg-green" data-toggle="modal" data-target="#pesertaModal"> <i class="fa fa-plus nav-icon"></i>&nbsp; Add
    </button>
@endsection
@section('content')
<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Email</th>
                <th>No tlp</th>
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
                <td style="padding: 13px 8px;">{{ $participants->email }}</td>
                <td style="padding: 13px 8px;">{{ $participants->no_tlp }}</td>
                <td style="padding: 13px 8px;">{{ $participants->sekolah }}</td>
                <td style="padding: 13px 8px;">{{ $participants->angkatan}}</td>
                <td style="padding: 13px 8px;">{{ $participants->program->nama_program }}</td>
                <td style="padding: 8px; vertical-align: middle;">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu animated-fast fadeIn">
                            <li>
                                <a href="{{ route('participant.edit', $participants->id) }}" class="btn-edit"> <i class="fa fa-pencil"></i> Edit Peserta </a>
                            </li>
                            <li>
                                <form action="{{ route('participant.delete',$participants->id) }}" method="POST"  enctype="multipart/form-data" >
                                    @csrf
                                    <button type="submit" class="launch center-block" onclick="return confirm('Yakin mau hapus {{ $participants->name }}?')"><i class="dlt fa fa-trash"></i>Delete Peserta</button>
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
                <form action="{{ route('participant.tambah') }}" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid invalid @enderror" id="name" aria-describedby="emailHelp" placeholder="Masukan Nama Anda" >
                        @error('name')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" value="{{ old('email') }}" type="text" class="form-control @error('email') is-invalid invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Masukan Email Anda" >
                        @error('email')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">No tlp</label>
                        <input name="no_tlp" value="{{ old('no_tlp') }}" type="text" class="form-control @error('no_tlp') is-invalid invalid @enderror" id="no_tlp" aria-describedby="emailHelp" placeholder="Masukan No tlp Anda" >
                        @error('no_tlp')
                        <span class="invalid"><i>{{$message}}</i></span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="sekolah">Sekolah</label>
                        <input name="sekolah" value="{{ old('sekolah') }}" type="text" class="form-control @error('sekolah') is-invalid invalid @enderror" id="sekolah" aria-describedby="sekolahHelp" placeholder="Masukan Sekolah Anda">
                        @error('sekolah')
                            <span class="invalid"><i>{{$message}}</i></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="angkatan_id" class=" form-control-label">Angkatan</label>
                        <select name="angkatan" class="form-control @error('angkatan') is-invalid invalid @enderror" id="angkatan">
                            <option value="Batch 1" >Batch 1</option>
                            <option value="Batch 2" >Batch 2</option>
                            <option value="Batch 3" >Batch 3</option>
                            <option value="Batch 4">Batch 4</option>
                            <option value="Batch 5">Batch 5</option>
                            <option value="Batch 6">Batch 6</option>
                            <option value="Batch 7">Batch 7</option>
                            <option value="Batch 8">Batch 8</option>
                            <option value="Batch 9">Batch 9</option>
                            <option value="Batch 10">Batch 10</option>
                            {{--  @foreach ($angkatan as $com)
                                <option  value="{{$com->id}}">{{$com->nama_angkatan}}</option>
                            @endforeach  --}}
                        </select>
                        <p class="text-danger">{{ $errors->first('angkatan_id') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="program_id" class=" form-control-label">Program</label>
                        <select name="program" class="form-control @error('program_id') is-invalid invalid @enderror" id="program_id">
                            @foreach ($program as $com)
                                <option  value="{{$com->id}}">{{$com->nama_program}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('program_id') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Import File</h5>
            </div>
            <form action="{{ route('participants.import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- /.box -->
