@extends('Admin.Layouts.master')

@section('content')
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="shopping-cart" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.orders.completed') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $orderState['completed'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Completed Orders</p>
                            </a>

                        </div>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="shopping-cart" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.orders') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $orderState['total'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Total Orders</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="shopping-cart" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.orders') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $orderState['pending'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Pending Orders</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="shopping-cart" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.orders.ready') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $orderState['in_progress'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Ready Orders</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="file-plus" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.quotes', ['status' => 'Pending']) }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $quotes['new'] }}">
                                </h5>
                                <p class="mb-0 text-muted">New Quotes</p>
                            </a>

                        </div>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="file-plus" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.quotes', ['status' => 'Accepted']) }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $quotes['accepted'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Accepted Quotes</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="file-plus" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.quotes') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $quotes['rejected'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Rejected Quotes</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="file-plus" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.quotes') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $quotes['total'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Total Quotes</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-xl-3 col-sm-6 mb-4">
                {{-- <a href="{{ route('get.business') }}"> --}}
                <!-- Card-->
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div
                            class="flex-shrink-0 size-60 bg-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i data-feather="dollar-sign" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('admin.quotes') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $totalIncomes }}">
                                </h5>
                                <p class="mb-0 text-muted">Total Income</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="row row-cols-md-4 row-cols-lg-4">
            <div class="card">
                <canvas class="m-4" id="myPieChart" width="200" height="200"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    @include('Admin.Panel.graph.script', [
        'totalIncome' => $totalIncomes,
        'totalOrders' => $orderState['total'],
        'totalQuotes' => $quotes['total'],
    ])
@endsection
