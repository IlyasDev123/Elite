@extends('Admin.Layouts.master')
@section('content')
    <div class="container-fluid px-0">
        <div class="row card">
            @include('Admin.Panel.order.tabs')
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">Completed Orders List</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Source file</th>
                                    <th>Action</th>
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
                                            {{ $order->product->product_category }}
                                        </td>
                                        <td>
                                            {{ $order->product->product_type == 1 ? 'Physical' : 'Digital' }}
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
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary"
                                                title="Detail Order">Detail</a>

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
@endsection
@section('js-script')
    <script>
        $("#datatable").DataTable({
            "filter": true,
            "length": false
        });
    </script>
@endsection
