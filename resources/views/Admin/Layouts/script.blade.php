<script src="{{ asset('admin/assets/vendor/feather.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/theme.bundle.js') }}"></script>
<script>
    feather.replace()
</script>

<!--////////////Theme Core scripts End/////////////////-->
{{-- <script src="{{ asset('admin/assets/vendor/quill.min.js') }}"></script> --}}

<!-- Toastr notification -->
<script src="{{ asset('admin/assets/toastr/toastr.min.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!--intlTelInput.jquery-->


<!--Charts-->
<script src="{{ asset('admin/assets/vendor/apexcharts.min.js') }}"></script>

<!--Dashboard duration calendar-->
<script src="{{ asset('admin/assets/vendor/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/daterangepicker.js') }}"></script>


<!--Datatables-->
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

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
    $(function() {

        var start = moment().subtract(6, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });

    //Init Chart
    var cPrimary = "#2794F9";
    var cWarning = "#ffb016";
    var cSecondary = "#ff4d62";
    var cSuccess = "#43b18e";
    var cMuted = "#879099";
    var cBodycolor = "#243A50";
    var cLight = "#f5f8fb";
    var cGray = "#CFDBE7";
    var cFont = "inherit";

    //Sparkline charts

    // document.addEventListener("DOMContentLoaded", function() {
    //     // Datatables Responsive
    //     $("#datatable").DataTable({
    //         "filter": true,
    //         "length": false
    //     });

    // });



    $(".add_adon_select2").select2({
        tags: true,
        placeholder: "Please select options...",
        tokenSeparators: [','],
    }).on('select2:unselecting', function(e) {
        if ($(e.params.args.data.element).attr('locked') || e.params.args.originalEvent.type ==
            'mouseup') {
            e.preventDefault();
        }
    });

    $(document).ready(function() {
        $('.add_mealType_select2').select2({
            placeholder: "Please select options...",
        }).on('select2:unselecting', function(e) {
            if ($(e.params.args.data.element).attr('locked') || e.params.args.originalEvent.type ==
                'mouseup') {
                e.preventDefault();
            }
        });

        $('.add_productCategory_select2').select2({
            placeholder: "Please select options...",
        }).on('select2:unselecting', function(e) {
            if ($(e.params.args.data.element).attr('locked') || e.params.args.originalEvent.type ==
                'mouseup') {
                e.preventDefault();
            }
        });;
    });

    //    For product configuration
    $(document).on('mouseover', '.product-config-svg-outer', function() {
        if (!$(this).hasClass('active')) {
            $(this).addClass('custom-active')
            $(this).find('.product-config-svg').attr('src',
                "{{ asset('/assets/img/icons/product-config.svg') }}");
        }
    });
    $(document).on('mouseout', '.product-config-svg-outer', function() {
        if (!$(this).hasClass('active')) {
            $(this).removeClass('custom-active')
            $(this).find('.product-config-svg').attr('src',
                "{{ asset('/assets/img/icons/product-configs.svg') }}");
        }
    });
    $(".nav-item .active span:first .product-config-svg").attr('src',
        "{{ asset('/assets/img/icons/product-config.svg') }}")


    //    For product
    $(document).on('mouseover', '.product-box-svg-outer', function() {
        if (!$(this).hasClass('active')) {
            $(this).addClass('custom-active')
            $(this).find('.product-box-svg').attr('src', "{{ asset('/assets/img/icons/package-box-1.svg') }}");
        }
    });
    $(document).on('mouseout', '.product-box-svg-outer', function() {
        if (!$(this).hasClass('active')) {
            $(this).removeClass('custom-active')
            $(this).find('.product-box-svg').attr('src',
                "{{ asset('/assets/img/icons/package-box.svg') }}");
        }
    });
    $(".nav-item .active span:first .product-box-svg").attr('src',
        "{{ asset('/assets/img/icons/package-box-1.svg') }}")


    //    For stock management
    $(document).on('mouseover', '.product-stock-svg-outer', function() {
        if (!$(this).hasClass('active')) {
            $(this).addClass('custom-active')
            $(this).find('.product-stock-svg').attr('src', "{{ asset('/assets/img/icons/stock_white.svg') }}");
        }
    });
    $(document).on('mouseout', '.product-stock-svg-outer', function() {
        if (!$(this).hasClass('active')) {
            $(this).removeClass('custom-active')
            $(this).find('.product-stock-svg').attr('src',
                "{{ asset('/assets/img/icons/stock_grey.svg') }}");
        }
    });
    $(".nav-item .active span:first .product-stock-svg").attr('src',
        "{{ asset('/assets/img/icons/stock_white.svg') }}")


    // page refresh when click back button of browser
    window.addEventListener('pageshow', function(event) {
        const historyTraversal = event.persisted ||
            (typeof window.performance != "undefined" &&
                window.performance.navigation.type === 2);
        if (historyTraversal) {
            // Handle page refresh
            window.location.reload();
        }
    });

    // Max length
    function maxLengthCheckNumber(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }

    // Only number
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    // Payment limit and float check
    function isFloat(evt, object) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode != 46) || object.value > 999.99) {
            return false;
        }
        return true;
    }
</script>
