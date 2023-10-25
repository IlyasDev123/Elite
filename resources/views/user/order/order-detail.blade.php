@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card mt-5 mb-5 w-100">
                <div class="card-header text-center">
                    <h1 class="mb-0">Order Detail</h1>
                    <span class="text-muted" id="orderno">Order #{{ $order->id }}</span>
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

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Order Type</h5>
                            <p>{{ $order->order_type }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Design Name</h5>
                            <p>{{ $order->name }}</p>
                        </div>

                        <div class="col-md-3">
                            <h5>Type</h5>
                            <p>{{ $order->type }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Placement</h5>
                            <p>{{ $order->placement }}</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <h5>Color Name</h5>
                            <p>{{ $order->name_of_color }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>No of Color</h5>
                            <p>{{ $order->no_of_color }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Width</h5>
                            <p>{{ $order->width }} {{ $order->unit }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Height</h5>
                            <p>{{ $order->height }} {{ $order->unit }}</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <h5>Design Format</h5>
                            <p>{{ $order->design_format ?? $order->other_format }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Appliques</h5>
                            <p>{{ $order->applique }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Time Frame</h5>
                            <p>{{ $order->time_frame }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Auto Thread Cutting </h5>
                            <p>{{ $order->thearding_cute_size }}</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5>Additional Instructions</h5>
                            <p>{{ $order->extra_instruction }}</p>
                        </div>

                        <div class="col-md-6">
                            <h5>Attachments</h5>
                            @foreach ($order->files as $file)
                                <a href="{{ asset('storage/' . $file->file) }}" target="_blank">{{ $file->file }}</a>
                            @endforeach
                        </div>

                    </div>

                    <hr>

                    {{-- <div class="card-footer text-center">
                        <div class="row">
                            <div class="col">
                                <h3>Total:</h3>
                            </div>
                            <div class="col">
                                <h3><b>$847.95</b></h3>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary">Track your order</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    @endsection
