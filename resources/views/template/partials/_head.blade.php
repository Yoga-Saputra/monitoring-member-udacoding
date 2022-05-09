<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Mentoring</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- ICONS -->
<link rel="apple-touch-icon" sizes="76x76" href="{{url('frontend/img/logo_uda.jpeg')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{url('frontend/img/logo_uda.jpeg')}}">
<link href="{{ url('adminlte/select2.min.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{url('adminlte/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{url('adminlte/bootstrap/css/bootstrap.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{url('adminlte/plugins/datatables/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{url('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css') }}">

<link rel="stylesheet" href="{{url('adminlte/dist/css/skins/_all-skins.min.css') }}">
<link rel="stylesheet" href="{{url('adminlte/plugins/iCheck/flat/blue.css') }}">
<link rel="stylesheet" href="{{url('adminlte/plugins/morris/morris.css') }}">
<link rel="stylesheet" href="{{url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<link rel="stylesheet" href="{{url('adminlte/plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{url('adminlte/plugins/daterangepicker/daterangepicker.css') }}">

<link rel="stylesheet" href="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<style>
  button.launch {
    background-color: transparent;
    border: none;
    height: 25px;
    color: #777;
    padding: 0 28px 0 0px;
    font-weight: 300;
    font-size: 14px;
    border-color: none;
}

  button.launch:hover {
      cursor: pointer;
      background-color: #e1e3e9;
  }
i.dlt {
    position: relative;
    left: -10px;
  }
  a.color-bg:hover{
    cursor: pointer !important;
    border-left-color: #40962d !important;
  }
</style>

