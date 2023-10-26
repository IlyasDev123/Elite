@extends('layouts.app')

@section('content')
    <div>
        @include('user.order.tabs')
    </div>
    <div class="container-fluid custom__card">
        <div class="d-flex justify-center">
            <span class="table-title text-center ">Payment Is Pending</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase text-bold">
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->product->product_category }}</td>
                                        <td>{{ $order->product->product_type == 1 ? 'Physical' : 'Digital' }}</td>
                                        <td>{{ $order->product->product_quantity }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary payment-btn"
                                                data-id="{{ $order->id }}" data-price="{{ $order->price }}"
                                                data-product-type="{{ $order->product->product_type }}"
                                                data-profuct-quanity="{{ $order->product->product_quantity }}"
                                                data-bs-toggle="modal" data-bs-target="#payment" title="Pay Now">Pay now</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($orders->isNotEmpty())
        @include('user.order.payment-modal', ['order' => $order])
    @endif
@endsection

@section('js-script')
    <script>
        function deleteBlog(id) {
            $('#delete-id').val(id)
        }
    </script>
@endsection
