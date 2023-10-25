<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    {{-- fav-Icon --}}

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav-icon.png') }}">

    <!--intlTelInput.css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/build/css/intlTelInput.css') }}">

    <!--Bootstrap icons-->
    <link href="{{ asset('admin/assets/fonts/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    {{-- Quill editor css --}}
    {{-- <link href="{{ asset('admin/assets/vendor/css/quill.snow.css') }}" rel="stylesheet"> --}}

    {{-- Summernote editor css --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" /> --}}

    <!--Simplebar css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/simplebar.min.css') }}">

    <!--Choices css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/choices.min.css') }}">

    <!--Date range picker css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/daterangepicker.css') }}">

    <!--Main style-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom-css.css') }}">

    {{-- Datatables css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">

    <!-- Toastr notification css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/toastr/toastr.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>
