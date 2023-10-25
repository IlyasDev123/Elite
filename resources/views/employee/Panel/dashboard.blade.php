@extends('employee.Layouts.master')

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
                            <i data-feather="bar-chart" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('employee.orders.completed') }}">
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
                            <i data-feather="bar-chart" class="fe-3x d-block"></i>
                        </div>
                        <div class="flex-grow-1 text-start">
                            <a href="{{ route('employee.orders') }}">
                                <h5 class="fs-4 d-block mb-1" data-aos data-aos-id="countup:in"
                                    data-to="{{ $orderState['assigned'] }}">
                                </h5>
                                <p class="mb-0 text-muted">Pending Orders</p>
                            </a>
                        </div>

                    </div>
                </div>
                </a>
            </div>
        </div>

    </div>
    {{-- {{ dd($bigData) }} --}}
@endsection
