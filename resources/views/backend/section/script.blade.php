{{-- Bootstrap JS --}}
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
{{-- end Bootstrap JS --}}
{{-- plugins --}}
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
{{-- end plugins --}}
{{-- Vector map JavaScript --}}
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/chartjs/js/chart.js') }}"></script>
<script src="{{ asset('backend/assets/js/index.js') }}"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('script')
{{-- Password show & hide js --}}
{{-- script datatable --}}
<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- end script datatable --}}
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<script>
    new PerfectScrollbar(".app-container")
</script>
{{-- photo Preview Script --}}
<script>
    $(document).ready(function() {
        $('#Photo').on('change', function(event) {
            let file = event.target.files[0]; // យក file ថ្មី
            if (file) {
                $('#photoPreview')
                    .attr('src', URL.createObjectURL(file)) // ត្រឹមត្រូវ
                    .css('display', 'block'); // បង្ហាញ preview
            } else {
                $('#photoPreview').css('display', 'none'); // បិទ preview បើគ្មាន
            }
        });
    });
</script>
{{-- end photo Preview Script --}}
{{-- Data Table --}}
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
{{-- end Data Table --}}
{{-- app JS --}}
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
{{-- end app JS --}}
<!-- Sweet alert toast script -->
<script>
    @if (session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#fff',
        });
    @elseif (session('error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    @endif
</script>
{{-- Include JS for Froala --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
</script>

<script>
    // Initialize Froala Editor
    new FroalaEditor('.editor', {
        toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'formatOL', 'formatUL', 'insertLink',
            'insertImage'
        ],
        height: 200
    });
</script>


@stack('scripts')
