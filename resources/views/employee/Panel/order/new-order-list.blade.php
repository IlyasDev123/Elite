@extends('employee.Layouts.master')
@section('content')
    <div class="container-fluid px-0">
        <div class="row card">
            @include('employee.Panel.order.tabs')
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">New Orders List</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th class="col-1">#</th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Product Category</th>
                                    <th>Order Description</th>
                                    <th>Instruction</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $order->product->name }}
                                        </td>
                                        <td>
                                            {{ $order->product->product_quantity }}
                                        </td>
                                        <td>
                                            {{ $order->product->product_category }}
                                        </td>
                                        <td>
                                            {{ $order->description }}
                                        </td>
                                        <td>
                                            {{ $order->assignOrder->description }}
                                        </td>
                                        <td>
                                            <a href="{{ route('employee.orders.show', $order->id) }}" title="View order"><i
                                                    class="text-primary" data-feather="eye"></i></a>

                                            <a href="#" data-bs-toggle="modal" class="submit-order"
                                                data-bs-target="#submit-order" title="Submit Order"
                                                data-id="{{ $order->id }}"><i class="text-danger ms-2"
                                                    data-feather="file-text"></i></a>
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
        @include('employee.Panel.order.submit-order-modal', ['order' => $order])
    @endif
@endsection

@section('js-script')
    <script>
        $("#datatable").DataTable({
            "filter": true,
            "length": false
        });
    </script>
@endsection
