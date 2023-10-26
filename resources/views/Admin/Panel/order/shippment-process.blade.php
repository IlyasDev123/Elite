@extends('Admin.Layouts.master')
@section('content')
    <div class="container-fluid px-0">
        <div class="row card">
            @include('Admin.Panel.order.tabs')
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">Shipment Orders List</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Prdouct Name</th>
                                    <th data-orderable="false">Product Type</th>
                                    <th data-orderable="false">Product Category</th>
                                    <th data-orderable="false">Product Quantity</th>
                                    <th>Status</th>
                                    <th data-orderable="false">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->order_number }}</td>

                                        <td>
                                            {{ $order->product->name }}
                                        </td>
                                        <td>
                                            {{ $order->product->product_type == 1 ? 'Physical' : 'Digital' }}
                                        </td>
                                        <td>
                                            {{ $order->product->product_category }}
                                        </td>
                                        <td>
                                            {{ $order->product->product_quantity }}
                                        </td>
                                        <td>
                                            @if ($order->status == 6 && $order->tracker_id == null)
                                                <span class="text-primary">Shipping Processing</span>
                                            @elseif($order->status == 6 && $order->tracker_id != null)
                                                <span class="text-info">Shipped</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}" title="View order"><i
                                                    class="text-primary" data-feather="eye"></i></a>

                                            @if ($order->tracker_id == null)
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#submit-order"
                                                    title="Submit track Id" class="submit-order"
                                                    data-id="{{ $order->id }}"><i class="text-danger ms-2"
                                                        data-feather="file-text"></i></a>
                                            @else
                                                <a class="" href="{{ route('admin.orders.delivered', $order->id) }}"
                                                    title="Update track Id"><i class="text-success ms-2"
                                                        data-feather="edit"></i>
                                                </a>
                                            @endif

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
        @include('Admin.Panel.order.submit-trackid', ['order' => $order])
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
