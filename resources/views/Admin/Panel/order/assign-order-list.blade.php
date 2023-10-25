@extends('Admin.Layouts.master')
@section('content')
    <div class="container-fluid px-0">
        <div class="row card">
            @include('Admin.Panel.order.tabs')
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">Assign Order List</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>#</th>
                                    <th data-orderable="false">Order Type</th>
                                    <th>Design Name</th>
                                    <th>Instruction</th>
                                    <th>Assigned To</th>
                                    <th>Assign Date</th>
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
                                            {{ $order->description }}
                                        </td>
                                        <td>
                                            {{ $order?->assignOrder?->user?->name }}
                                        </td>
                                        <td>
                                            {{ $order?->assignOrder?->created_at->format('d-m-Y') }}
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
