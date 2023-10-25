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
                                    <th>Design Name</th>
                                    <th>No of color</th>
                                    <th>Colors name</th>
                                    <th>Order Type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->no_of_color }}</td>
                                        <td>{{ $order->name_of_color }}</td>
                                        <td>{{ $order->order_type }}</td>
                                        <td>{{ $order->submitOrder?->price }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#payment" title="Pay Now">Pay now</a>
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
