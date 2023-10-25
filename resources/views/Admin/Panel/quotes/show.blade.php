@extends('Admin.Layouts.master')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card mt-5 mb-5 w-100">
                <div class="card-header text-center">
                    <h1 class="mb-2 table-title text-center ">Quote Detail</h1>
                    <span class="text-muted" id="quoteno">quote #{{ $quote->id }}</span>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="title">User Name</h5>
                            <p>{{ $quote->user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="title">Email</h5>
                            <p>{{ $quote->user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-body m-4">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <h5 class="title">Name:</h5>
                            <p class="p-1">{{ $quote->product->name }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="title">Product Category:</h5>
                            <p class="p-1">{{ $quote->product->product_category }}</p>
                        </div>

                        <div class="col-md-3">
                            <h5 class="title">Product Type:</h5>
                            <p class="p-1">{{ $quote->product->product_type }}</p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="title">Product Quantity:</h5>
                            <p class="p-1">{{ $quote?->product?->product_quantity }}</p>
                        </div>
                    </div>
                    @php
                        $data = json_decode($quote->product->attributes, true);
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
                        <div class="col-md-9">
                            <h5 class="title">Additional Instructions:</h5>
                            <p class="p-1">{{ $quote->instruction_notes }}</p>
                        </div>

                        <div class="col-md-3">
                            <h5 class="title">Price:</h5>
                            <p class="p-1">${{ $quote?->price }}</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h5 class="title mb-3">Images:</h5>
                        @foreach ($quote->product->productImages->chunk(4) as $chunk)
                            @foreach ($chunk as $file)
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/' . $file->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $file->image) }}" alt="" width="100px"
                                            height="100px">
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>



                    {{-- <div class="card-footer text-center">
                        <div class="mt-4">
                            <button class="btn btn-primary">Submit Your Price</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        @endsection
