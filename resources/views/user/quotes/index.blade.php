@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-6 d-flex">
            <a class="btn btn-success" href="{{ route('quotes.create') }}">Custom Patch </a>
            <a class="btn btn-success  ml-4" href="{{ route('emborided-patches') }}">Custom Clothing</a>
        </div>
    </div>
    <div class="container-fluid custom__card">
        <div class="d-flex justify-center">
            <span class="table-title text-center ">Quotes List</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase text-bold">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotes as $quote)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quote->product->name }}</td>
                                        <td>{{ $quote->product->product_category }}</td>
                                        <td>Physical Product</td>
                                        <td>{{ $quote->product->product_quantity }}</td>
                                        <th> @switch($quote->status)
                                                @case(1)
                                                    <span class="badge bg-warning">Pending</span>
                                                @break

                                                @case(2)
                                                    <span class="badge bg-primary">Payment Pending</span>
                                                @break

                                                @case(3)
                                                    <span class="badge bg-success">Accepted</span>
                                                @break

                                                @case(4)
                                                    <span class="badge bg-danger">Rejected</span>
                                                @break

                                                @default
                                            @endswitch
                                        </th>
                                        <td><a href="{{ route('quotes.show', $quote->id) }}">
                                                <i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        function deleteBlog(id) {
            $('#delete-id').val(id)
        }
    </script>
@endsection
