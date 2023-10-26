<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
@yield('scripts-js')

<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    var flag = false;
    setInterval(function() {
        if (!flag) {
            flag = true;
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif

            @if (Session::has('invalid'))

                @foreach (Session::get('invalid') as $message)
                    toastr.warning("{{ $message[0] }}");
                @endforeach
            @endif

            @if (Session::has('info'))
                toastr.info("{{ Session::get('info') }}");
            @endif

            @if (Session::has('danger'))
                toastr.error("{{ Session::get('danger') }}");
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @if ($loop->iteration == 1)
                        var error = "{{ $error }}";
                        error = error.replace(' en ', ' English ');
                        error = error.replace(' es ', ' Spanish ');
                        error = error.replace(' de ', ' German ');
                        toastr.error(error);
                    @endif
                @endforeach
            @endif

        }
    }, 1000);

    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatable").DataTable({
            "filter": true,
            "length": false
        });

    });

    $(document).ready(function() {
        $('#dropdown-toggle').click(function(event) {
            event.stopPropagation(); // Prevents the click event from propagating to the document
            $('.dropdown__menu').toggle();
        });

        $(document).click(function() {
            $('.dropdown__menu').hide();
        });
    });
</script>
