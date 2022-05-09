@extends('template.master')
@section('submenu')
<section class="content-header">
    <h1> User </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User</li>
    </ol>
</section>
@endsection
@section('modal')
    @if (Auth::user()->level == 'admin')
        <a href="{{ url('uploads/format/format_import_user.xlsx') }}" class="btn btn-sm bg-green"><i class="fa fa-download"></i>&nbsp; Download Format Import</a>
        <button type="button" class="btn btn-sm bg-green" data-toggle="modal" data-target="#import"> <i class="fa fa-file-excel-o nav-icon"></i> &nbsp; Import</button>
        {{-- <a href="{{ route('week1.store') }}" class="btn btn-sm bg-green"><i class="fa fa-plus nav-icon"></i>&nbsp; Add</a> --}}
    @endif
@endsection
@section('content')
{{--
--}}
<div class="box">

    <div class="box-body">
        <table id="table-datatables" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 0;
                @endphp
                @foreach ($users as $user)
                @php
                $no++;
                @endphp
                <tr>
                    <td style="padding: 13px 8px;">{{ $no }}</td>
                    <td style="padding: 13px 8px;">{{ $user->name }}</td>
                    <td style="padding: 13px 8px;">{{ $user->level }}</td>
                    <td style="padding: 13px 8px;">{{ $user->email }}</td>
                    <td style="padding: 8px; vertical-align: middle;">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-flat center-block bg-green dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false"> Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu animated-fast fadeIn">
                                <li>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn-edit"> <i
                                            class="fa fa-pencil"></i>Edit User </a>
                                </li>
                                <li>
                                    <form action="{{ route('user.delete', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="launch center-block"
                                            onclick="return confirm('Yakin mau hapus {{ $user->name }} ?')"><i
                                                class="dlt fa fa-trash"></i>Delete User</button>
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
        function confirmdelete(id) {
            var pesan = 'yakin mau dihapus id ' + id + '??';
            if (confirm(pesan)) {
                window.location = '{{ url("grade/week1/delete") }}/' + id;
            } else {
                return false;
            }
        }

    </script>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Import File</h5>
            </div>
            <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
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




    {{--  <td style="padding: 13px 8px;">{{ $week2s->total_grade }}</td>
    <td style="padding: 13px 8px;">{{ $week1s->total_grade + $week2s->total_grade }}</td> --}}
