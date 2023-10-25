@extends('layouts.app')

@section('content')
    <div>
        @include('user.order.tabs')
    </div>
    <div class="container-fluid custom__card">
        <div class="d-flex justify-center">
            <span class="table-title text-center ">Orders In Process</span>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->product->product_category }}</td>
                                        <td>{{ $order->product->product_type }}</td>
                                        <td>{{ $order->product->product_quantity }}</td>
                                        <td>Action</td>
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
