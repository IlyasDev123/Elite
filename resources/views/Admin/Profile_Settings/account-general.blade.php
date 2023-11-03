@extends('Admin.Layouts.master')

@section('content')
    <div class="container-fluid px-0 h-100">
        <div class="row h-100">
            <div class="col-lg-3">
                <!--Account nav-->
                <ul class="nav nav-tabs nav-vertical mb-4 h-100">
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ Route::currentRouteName() == 'showSettings' ? 'active' : '' }} px-3">
                            <i data-feather="user" class="fe-1x align-middle me-2"></i>General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('showSecurity') }}"
                            class="nav-link {{ Route::currentRouteName() == 'showSecurity' ? 'active' : '' }} px-3">
                            <i data-feather="shield" class="fe-1x align-middle me-2"></i>Security
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <!--Card-->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-between align-items-center">
                                {{-- <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="position-relative">
                                                <div class="avatar size-140">
                                                    @if (auth()->guard('admin')->user()->profile_pic)
                                                        <img style="height: 134px;
                                                    width: 150px;
                                                    border-radius: 100%;"
                                                            class="img-fluid rounded-pill auth-profile-pic"
                                                            src="{{ asset('assets/img/admin_dp/compress/' .auth()->guard('admin')->user()->profile_pic_thumbnail) }}"
                                                            alt="...">
                                                    @else
                                                        <img class="img-fluid rounded-pill auth-profile-pic"
                                                            src="{{ asset('assets/img/admin_dp/dummy-admin.png') }}"
                                                            alt="..."
                                                            style="height: 134px;
                                                        width: 150px;
                                                        border-radius: 100%;">
                                                    @endif
                                                </div>
                                                <!--Upload Button -->
                                                <div
                                                    class="position-absolute end-0 bottom-0 w-auto h-auto p-1 rounded-circle bg-white">
                                                    <label data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Update Avatar"
                                                        class="btn p-0 size-40 rounded-circle d-flex align-items-center justify-content-center btn-primary">
                                                        <input type="file" name="profile_pic" accept="image/*"
                                                            id="edit-self-profile-image" style="display: none" />
                                                        <i data-feather="camera" class="fe-2x"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5 class="mb-1">
                                                Profile Picture
                                            </h5>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label required" for="user_fname">
                                            name
                                        </label>
                                        <!-- Input -->
                                        <input type="text" name="first_name"
                                            value="{{ auth()->guard('admin')->user()->name }}" class="form-control"
                                            id="user_fname">
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-md-6 mb-3">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label required" for="user_lname">
                                            Last name
                                        </label>
                                        <!-- Input -->
                                        <input type="text" name="last_name"
                                            value="{{ auth()->guard('admin')->user()->last_name }}" class="form-control"
                                            id="user_lname">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <!-- Label -->
                                    <label class="form-label required" for="user_email">
                                        Email
                                    </label>
                                    <!-- Input -->
                                    <input class="form-control" name="email"
                                        value="{{ auth()->guard('admin')->user()->email }}" id="user_email" type="email">
                                </div>
                                {{-- <div class="col-12 col-md-6 mb-3">
                                    <!-- Label -->
                                    <label class="form-label" for="user_email">
                                        Phone Number
                                    </label>
                                    <!-- Input -->
                                    <input class="form-control" value="{{ auth()->guard('admin')->user()->phone_number }}"
                                        id="user_number" type="text" disabled>
                                </div> --}}
                                {{-- <div class="col-12 col-md-6 mb-3">
                                    <!-- Label -->
                                    <label class="form-label" for="user_email">
                                        Address
                                    </label>
                                    <!-- Input -->
                                    <input class="form-control" name="address"
                                        value="{{ auth()->guard('admin')->user()->address }}" id="user_number"
                                        type="text">
                                </div> --}}
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-script')
    <script>
        $('#edit-self-profile-image').change(function(e) {
            var file = $(this).get(0).files[0];
            var url = URL.createObjectURL(file);
            $(".auth-profile-pic").attr("src", url);
        })
    </script>
@endsection
