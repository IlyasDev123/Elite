@extends('Admin.Layouts.master')
@section('content')
    <div class="container-fluid px-0">
        <div class="row card">
            @include('Admin.Panel.order.tabs')
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">New Orders List</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>#</th>
                                    <th data-orderable="false">Order Type</th>
                                    <th>Design Name</th>
                                    <th data-orderable="false">Action</th>
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
                                            <a href="{{ route('admin.orders.show', $order->id) }}" title="View order"><i
                                                    class="text-primary" data-feather="eye"></i></a>

                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editorder"
                                                title="Assign"><i class="text-warning ms-2"
                                                    data-feather="user-plus"></i></a>

                                            <a href="#" data-bs-toggle="modal" data-bs-target="#submit-order"
                                                title="Submit Order"><i class="text-danger ms-2"
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
        @include('Admin.Panel.order.assign-modal', ['order' => $order, 'users' => $designes])
        @include('Admin.Panel.order.submit-order-modal', ['order' => $order])
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
