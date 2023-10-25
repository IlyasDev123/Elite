@extends('Admin.Layouts.master')

@section('content')
    <div class="container-fluid px-0">

        <div class="row">
            <div class="col-lg-3">
                <!--Account nav-->
                <ul class="nav nav-tabs nav-vertical mb-4 h-100">
                    {{-- <li class="nav-item">
                        <a href="{{ route('showSettings') }}" class="nav-link px-3">
                            <i data-feather="user" class="fe-1x align-middle me-2"></i>General
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link active px-3">
                            <i data-feather="shield" class="fe-1x align-middle me-2"></i>Security
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 h-100">
                <div class="card">
                    <div class="card-header d-md-flex align-items-md-center justify-content-md-between">

                        <!-- card title -->
                        <h5 class="card-title mb-md-0">
                            Update password
                        </h5>

                    </div>

                    <!--card body-->
                    <div class="card-body">
                        <div class="row align-items-md-end">

                            <!--col-->
                            <div class="col-12 col-md-6 mb-4 mb-md-0">
                                <form action="{{ route('change.password') }}" method="POST">
                                    @csrf
                                    <!--current password -->
                                    <div class="mb-3">

                                        <!--current password Label -->
                                        <label class="form-label required">Current password</label>

                                        <!-- current password input -->
                                        <input type="text" name="current_password" class="form-control"
                                            placeholder="Enter Current Password" required>

                                    </div>
                                    <div class="mb-3">

                                        <!-- new password Label -->
                                        <label class="form-label required">
                                            New password
                                        </label>

                                        <!--new password input-->
                                        <input type="text" name="password" class="form-control"
                                            placeholder="Enter Password" required>

                                    </div>
                                    <div class="mb-3">

                                        <!--new password confirm Label -->
                                        <label class="form-label required">
                                            Confirm new password
                                        </label>

                                        <!--new password confirm input -->
                                        <input type="text" name="password_confirmation" class="form-control"
                                            placeholder="Enter Confirm Password" required>

                                    </div>

                                    <!-- form update password button -->
                                    <button class="btn w-100 btn-primary" type="submit">
                                        Update password
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
