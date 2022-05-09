<!-- jQuery 2.2.3 -->

<script src="{{ url('adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

<script src="{{url('adminlte//plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{url('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{url('adminlte//plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{url('adminlte//plugins/datatables/buttons.flash.min.js') }}"></script>
<script src="{{url('adminlte//plugins/datatables/jszip.min.js') }}"></script>
<script src="{{url('adminlte//plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{url('adminlte//plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{url('adminlte//plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{url('adminlte//plugins/datatables/buttons.print.min.js') }}"></script>

<script src="{{ url('adminlte/select2.min.js') }}"></script>
<script src="{{ url('adminlte/jquery-ui.min.js') }}"></script>
<script src="{{ url('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/dist/js/app.min.js') }}"></script>
<script src="{{ url('adminlte/dist/js/demo.js') }}"></script>
<script>
    $(document).ready (function () {
        $("#table-datatables").DataTable({
            dom: 'Bfrtip',
            buttons: [
                {extend:'csv', title:'data user'},
                {extend: 'pdf', title:'data user'},
                {extend: 'excel', title: 'data user'},
                {extend:'print',title: 'data user'},
            ]
        });
    });
</script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<script type="text/javascript">
    function getProgram(){
        var participantId = document.getElementById('participantId').value;
        // alert(participantId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "{{URL::to('change-program-angkatan') }}",
            data: {
                'id'    :participantId
            },
            success:function(data){
                $('#div1').html(data);
                $('#div2').html(data);

            }
        });
    }
    function peserta(){
        var participantId = document.getElementById('participantId').value;
        // alert(participantId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "{{URL::to('change-peserta') }}",
            data: {
                'id'    :participantId
            },
            success:function(data){
                $('#div1').html(data);
                $('#div2').html(data);

            }
        });
    }
</script>

<script>

    $(".searchParticipant").select2({
        placeholder:"Masukin nama peserta",
        ajax: {
            url: "/getParticipant",
            dataType: "json",
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                            item_text =  item.name;
                            return {
                                text: item_text,
                                id: item.id
                            };
                    })
                };
            },
            cache: false
        }
    }).on('change', function (e) {

    });

    </script>
{{-- <script>
    $(document).ready(function(){
        $('#nama_peserta').keyup(function() {
            var query = $(this).val();
            if(query != ' ')
            {
                // alert(query);
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch')}}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data)
                    {
                        // alert("Tes"); // ini keluar ga ?
                        $('#pesertaList').fadeIn(5);
                        $('#pesertaList').html(data);
                    }
                })
            }
        });
        $(document).on('click', 'li', function(e){
            $('#nama_peserta').val($(this).text());
            $('#pesertaList').fadeOut();
        });
        $(document).on('click', function(e){
            if($(e.target).closest('#nama_peserta').lenght == 0 ) {
                $('#pesertaList').hide();
            }
        });
    });
</script> --}}
{{-- <script>
    $(document).ready(function(){
        $('#nama_peserta').autocomplete({
            source: [
                'aje',
                'ajo',
                'aji',
                'aju',
                'aj',
                'aje',
                'aje',
                'ojo'
            ],
            select:function(e, data){
                console.log(data);
            }
        })
    })
</script> --}}

