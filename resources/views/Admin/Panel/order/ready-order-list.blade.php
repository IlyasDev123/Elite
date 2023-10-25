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
                                    <th data-orderable="false">Order Type</th>
                                    <th>Design Name</th>
                                    <th>Price</th>
                                    <th>Source file</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $order->order_type }}
                                        </td>
                                        <td>
                                            {{ $order->name }}
                                        </td>
                                        <td>
                                            {{ $order?->submitOrder?->price ?? 0.0 }}
                                        </td>

                                        <td>

                                            @if (isset($order->submitOrder->attachments))
                                                @foreach ($order->submitOrder->attachments as $item)
                                                    <li>
                                                        <a download="Source" href="{{ Storage::url($item->attachment) }}"
                                                            title="{{ $item->attachment }}">Download</a>
                                                    </li>

                                                    <br>
                                                @endforeach
                                            @endif

                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#detailOrder" title="Detail Order">Submit Price</a>

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

    @include('Admin.Panel.order.submit-price-modal', ['order' => $order])
@endsection
@section('js-script')
    <script>
        $("#datatable").DataTable({
            "filter": true,
            "length": false
        });
    </script>
@endsection
