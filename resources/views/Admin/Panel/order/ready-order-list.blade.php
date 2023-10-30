@extends('Admin.Layouts.master')
@section('content')
    <div class="container-fluid px-0">
        <div class="row card">
            @include('Admin.Panel.order.tabs')
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">Read Order List</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>#</th>
                                    <th data-orderable="false">Product Category</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Source file</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>

                                        <td>
                                            {{ $order->product->product_category }}
                                        </td>
                                        <td>
                                            {{ $order->product->name }}
                                        </td>
                                        <td>
                                            {{ $order->price ?? 0.0 }}
                                        </td>

                                        <td>

                                            @if (isset($order->attachments))
                                                @foreach ($order->attachments as $item)
                                                    <li>
                                                        <a download="Source" href="{{ Storage::url($item->attachment) }}"
                                                            title="{{ $item->attachment }}">Download</a>
                                                    </li>

                                                    <br>
                                                @endforeach
                                            @endif

                                        </td>
                                        <td>
                                            @if ($order->status == App\Utilities\Constant::ORDER_STATUS['Payment_pending'])
                                                <span class="badge bg-primary">Payment Pending</span>
                                            @elseif($order->status == App\Utilities\Constant::ORDER_STATUS['Processing'] && $order->price == null)
                                                <a href="#" class="btn btn-primary submit-order"
                                                    data-id="{{ $order->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#detailOrder" title="Detail Order">Submit Price</a>
                                            @elseif($order->status == App\Utilities\Constant::ORDER_STATUS['Completed'])
                                                <span class="badge bg-success">Completed</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}" title="View order"><i
                                                    class="text-primary" data-feather="eye"></i></a>
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
    @isset($order)
        @include('Admin.Panel.order.submit-price-modal', ['order' => $order])
    @endisset
@endsection
@section('js-script')
    <script>
        $("#datatable").DataTable({
            "filter": true,
            "length": false
        });
    </script>
@endsection
