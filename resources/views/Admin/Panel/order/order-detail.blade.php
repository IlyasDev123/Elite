@extends('Admin.Layouts.master')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card mt-5 mb-5 w-100">
                <div class="card-header text-center">
                    <h1 class="mb-0">Order Detail</h1>
                    <span class="text-muted" id="orderno">Order #{{ $order->order_number }}</span>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>User Name</h5>
                            <p>{{ $order->user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Email</h5>
                            <p>{{ $order->user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-body m-4">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <h5 class="title">Name:</h5>
                            <p class="p-1">{{ $order->product->name }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="title">Product Category:</h5>
                            <p class="p-1">{{ $order->product->product_category }}</p>
                        </div>

                        <div class="col-md-3">
                            <h5 class="title">Product Type:</h5>
                            <p class="p-1">{{ $order->product->product_type }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="title">Product Quantity:</h5>
                            <p class="p-1">{{ $order?->product?->product_quantity }}</p>
                        </div>
                    </div>
                    @php
                        $data = json_decode($order->product->attributes, true);
                        $columns = 4;
                    @endphp

                    @for ($i = 0; $i < count($data); $i += $columns)
                        <div class="row mt-2 mb-2">
                            @foreach (array_slice($data, $i, $columns, true) as $key => $value)
                                <div class="col-md-3">
                                    <h5 class="title">{{ $key }}:</h5>
                                    <p class="p-1">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endfor


                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5 class="title">Additional Instructions:</h5>
                            <p class="p-1">{{ $order->instruction_notes }}</p>
                        </div>

                        <div class="col-md-6">
                            <h5 class="title"> Price :</h5>
                            <p class="p-1">${{ $order->price ?? 0 }}</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h5 class="title mb-3">Images:</h5>
                        @foreach ($order->product->productImages->chunk(4) as $chunk)
                            @foreach ($chunk as $file)
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/' . $file->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $file->image) }}" alt="" width="150px"
                                            height="100px">
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    {{-- @if ($order->status == 2)
                        <div class="m-5 d-flex justify-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Accept Price
                            </button>

                            <button class="btn btn-danger ml-2" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                Reject Price
                            </button>
                        </div>
                    @endif --}}

                </div>
            </div>
        </div>
    @endsection
