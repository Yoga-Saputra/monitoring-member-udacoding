@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1>Testimoni</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">Testimoni</li>
    </ol>
</section>
@endsection
@section('modal')
<a href="{{ route('testimoni.store') }}" class="btn btn-sm bg-green"><i class="fa fa-plus nav-icon"></i>&nbsp; Add</a>
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
                    <th>Nama </th>
                    <th>Program</th>
                    <th>Angkatan</th>
                    <th style="text-align: center">Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 0;
                @endphp
                @foreach ($testimoni as $testimonis)
                @php
                $no++;
                @endphp
                <tr>
                    <td style="padding: 13px 8px;">{{ $no }}</td>
                    <td style="padding: 13px 8px;">{{ $testimonis->participant->name }}</td>
                    <td style="padding: 13px 8px;">{{ $testimonis->participant->program->nama_program }}</td>
                    <td style="padding: 13px 8px;">{{ $testimonis->participant->angkatan }}</td>
                    <td style="padding: 13px 8px;">{{ $testimonis->deskripsi }}</td>
                    <td style="padding: 8px; vertical-align: middle;">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false"> Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu animated-fast fadeIn">
                                <li>
                                    <a href="{{ route('testimoni.edit', $testimonis->id) }}" class="btn-edit"> <i
                                            class="fa fa-pencil"></i>Edit  </a>
                                </li>
                                <li>
                                    <form action="{{ route('testimoni.delete', $testimonis->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="launch center-block"
                                            onclick="return confirm('Yakin mau hapus testimoni dari {{ $testimonis->participant->name }} ?')"><i
                                                class="dlt fa fa-trash"></i>Delete </button>
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

    @endsection
