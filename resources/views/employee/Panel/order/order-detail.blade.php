@extends('Admin.Layouts.master')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card mb-5 w-100">
                <div class="card-header text-center">
                    <h1 class="mb-0">Order Detail</h1>
                    <span class="text-muted" id="orderno">Order number# {{ $order->order_number }}</span>
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
                                    <h5 class="title">{{ ucwords(str_replace('_', ' ', $key)) }}:</h5>
                                    <p class="p-1">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endfor


                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5 class="title">Detail Instruction:</h5>
                            <p class="p-1">{{ $order->description }}</p>
                        </div>
                    </div>
                    <hr class="mt-2 mb-3" />
                    <div class="row mt-3 mb-3">
                        <h4 class="mt-2 mb-2">Assign Detail</h4>
                        <div class="col-md-3">
                            <h5 class="title">Assign To:</h5>
                            <p class="p-1">{{ $order->assignOrder->user->name }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="title">Assign Date:</h5>
                            <p class="p-1">{{ $order->assignOrder->created_at->format('Y-m-d') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="title">Instruction For Designer:</h5>
                            <p class="p-1">{{ $order->assignOrder->description }}</p>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <h5 class="title mb-3">Images:</h5>
                        @foreach ($order->product->productImages->chunk(4) as $chunk)
                            @foreach ($chunk as $file)
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/' . $file->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $file->image) }}" alt="" width="100%"
                                            height="100px">
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <hr class="mt-2 mb-3" />

                    @if ($order->attachments->count() > 0)
                        <div class="row mt-5">
                            <h5 class="title mb-3">Order Submission Detail</h5>
                            <h5 class="title mb-3">Designer Order Submit Note:</h5>
                            <p>{{ $order->submission_note ?? null }}</p>
                            <h5 class="title mb-3">Design Files:</h5>
                            @foreach ($order->attachments->chunk(4) as $chunk)
                                @foreach ($chunk as $file)
                                    <div class="col-md-3">
                                        <div>
                                            <a href="{{ asset('storage/' . $file->attachment) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $file->attachment) }}" alt=""
                                                    width="100%" height="100px">
                                            </a>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <a download="Source" href="{{ Storage::url($file->attachment) }}"
                                                title="{{ $file->attachment }}">Download</a>
                                        </div>

                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        @endsection
