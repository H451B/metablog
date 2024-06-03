<!-- jQuery -->
<script src="{{ asset('ui/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('ui/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('ui/backend/dist/js/adminlte.js') }}"></script>
<!-- bootstrap5.3 -->
<script src="{{ asset('ui/backend/dist/js/bootstrap53.bundle.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('ui/backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('ui/backend/dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('ui/backend/dist/js/pages/dashboard3.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('ui/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/summernote.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/summernote-lite.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('ui/backend/plugins/summernote-bs5.min.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "paging": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>

{{-- sweetalert2 toast : success,info,error --}}
<script>
    $(function() {
        // Check if a success message exists
        var successMessage = "{{ session('success') }}";
        var errorMessage = "{{ session('error') }}";

        if (successMessage) {
            var ToastSuccess = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });

            // Show toast notification with the success message
            ToastSuccess.fire({
                icon: 'success',
                title: successMessage
            });
        }

        if (errorMessage) {
            var ToastError = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });

            // Show toast notification with the error message
            ToastError.fire({
                icon: 'error',
                title: errorMessage
            });
        }
    });
</script>

<script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>