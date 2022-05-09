<script src="{{url('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{url('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{url('frontend/jquery.dataTables.min.js') }}"></script>
<script src="{{url('frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{url('frontend/vendor/php-email-form/validate.js') }}"></script>
<script src="{{url('frontend/vendor/wow/wow.min.js') }}"></script>
<script src="{{url('frontend/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{url('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{url('frontend/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
<script src="{{url('frontend/vendor/superfish/superfish.min.js') }}"></script>
<script src="{{url('frontend/vendor/hoverIntent/hoverIntent.js') }}"></script>
<script src="{{url('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{url('frontend/js/main.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
