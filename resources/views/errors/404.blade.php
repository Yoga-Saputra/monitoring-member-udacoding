<!DOCTYPE html>
<html>
<head>
    @include('template.partials._head')
</head>
<body>
<section class="content">
  .<div class="container">
      <div class="container-fluid">
    <div class="row"  style="padding-top:10%;" >
      <div class="card" style="background-color: #f1f1f1 !important; padding:10px">
        <div class="card-body with-border">
          <div class="text-center ">
            <h1><font color="red"><b>404</b> || Not Found</font></small></h1>
            <!--<p>Maaf Page yang anda cari tidak ada Silahkan kembali</p>-->
            {{-- <a href="{{ route('dashboard') }}" class="btn btn-large btn-success"><span class="glyphicon glyphicon-home"></span> Take Me Home</a> --}}
          </div>
            <br/>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@include('template.partials._script')
</body>

</html>
