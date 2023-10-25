<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $getTerms->title !!}</title>
    {{-- Fav icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/usekrisp-icon.png') }}">

    {{-- bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('admin/assets/js/theme.bundle.js') }}"></script>


</head>

<body>
    <div class="container-fluid p-5 text-center">
        <h1>{!! $getTerms->title !!}</h1>
        <p>{!! $getTerms->description !!}</p>
    </div>

    <!--//Page-footer//-->
    <footer class="pb-4">
        <div class="container-fluid px-4">
            <span class="lh-sm small text-muted d-inline">
                <a href="{{ route('get.privacy') }}">
                    Privacy Policy
                </a>
                <a href="{{ route('get.terms') }}" class="ms-2">
                    Terms and Conditions
                </a>
            </span>
            <span class="lh-sm small text-muted text-end d-inline float-end">&copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>. Copyright
            </span>
        </div>
    </footer>
    <!--/.Page Footer End-->
</body>

</html>
