<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>

    {{-- Fav icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/usekrisp-icon.png') }}">

    <!--Bootstrap icons-->
    <link href="{{ asset('admin/assets/fonts/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
    <style>
        .resend-otp-button {
            background: #ffffff;
            border: 0px;
        }

        .resend-otp-button:hover {
            color: #2794f9 !important;
        }
    </style>
</head>

<body>
    <!--////////////////// PreLoader Start//////////////////////-->
    <div class="loader">
        <!--Placeholder animated layout for preloader-->
        <div class="d-flex flex-column flex-root">
            <div class="page d-flex flex-row flex-column-fluid">
                <div class="page-content ps-0 ms-0 d-flex flex-column flex-row-fluid">
                    <div
                        class="content flex-column p-4 pb-0 d-flex justify-content-center align-items-center flex-column-fluid position-relative">
                        <div class="w-100 h-100 position-relative d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-loader anim-spinner me-2">
                                <line x1="12" y1="2" x2="12" y2="6" />
                                <line x1="12" y1="18" x2="12" y2="22" />
                                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76" />
                                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07" />
                                <line x1="2" y1="12" x2="6" y2="12" />
                                <line x1="18" y1="12" x2="22" y2="12" />
                                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24" />
                                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93" />
                            </svg>
                            <div>
                                <span>Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--////////////////// /.PreLoader END//////////////////////-->

    <div class="d-flex flex-column flex-root">
        <!--Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            <!--///////////Page content wrapper///////////////-->
            <main class="page-content overflow-hidden ms-0 d-flex flex-column flex-row-fluid">

                <!--//content//-->
                <div class="content p-1 d-flex flex-column-fluid position-relative">
                    <div class="container py-4">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-md-8 col-lg-5 col-xl-4">
                                <!--Logo-->
                                <a href="#"
                                    class="d-flex position-relative mb-4 z-index-1 align-items-center justify-content-center">
                                    <img src="{{ asset('assets/images/usekrisp-logo.png') }}" style="width: 200px">
                                </a>
                                <!--Card-->
                                <div class="card card-body border-0 shadow-lg p-4">
                                    <h4 class="mb-1">Otp verification</h4>
                                    <p class="mb-4 text-muted">
                                        Enter otp to reset password.
                                    </p>
                                    @if (session('error'))
                                        <div class="text-danger text-center">{{ session('error') }}</div>
                                    @elseif (session('success'))
                                        <div class="text-success text-center">{{ session('success') }}</div>
                                    @endif
                                    <form action="{{ route('reset.otp.post') }}" method="post"
                                        class=" z-index-1 position-relative needs-validation" novalidate="">
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" required=""
                                                id="floatingInputEmail" placeholder="" name="otp">
                                            <label for="floatingInputEmail">Enter OTP</label>
                                            <span class="invalid-feedback">Please enter a valid otp</span>
                                        </div>
                                        <button class="w-100 btn btn-lg btn-primary mb-2"
                                            type="submit">Verify</button>
                                    </form>

                                    <p class="text-muted">
                                    <form action="{{ route('forget.password.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <input type="hidden" name="resend" value="1">
                                        <button type="submit"
                                            class="ms-2 text-dark float-end resend-otp-button">Resend OTP</button>
                                    </form>
                                    </p>
                                    <br>
                                    <hr class="mt-4 mb-3" style="margin-top:0px !important">
                                    <p class="text-muted mb-0">
                                        Remember your password?<a href={{ route('getLogin') }}
                                            class="ms-2 text-dark">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--///////////Page content wrapper end///////////////-->

                <!--//Page-footer//-->
                <footer class="pb-4">
                    <div class="container-fluid px-4">
                        <span class="d-block lh-sm small text-muted text-end">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>. Copyright
                        </span>
                    </div>
                </footer>
                <!--/.Page Footer End-->

            </main>
        </div>
    </div>

    <!--////////////Theme Core scripts Start/////////////////-->

    <script src="{{ asset('admin/assets/vendor/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/theme.bundle.js') }}"></script>
    <script>
        feather.replace()
    </script>

    <!--////////////Theme Core scripts End/////////////////-->

</body>

</html>
