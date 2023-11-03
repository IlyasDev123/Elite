@extends('Admin.Layouts.master')
@section('content')
    <div class="container-fluid px-0">
        <div class="row card">
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">Payments list</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th data-orderable="false">Amount</th>
                                    <th data-orderable="false">Payment date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $payment->order->id) }}">
                                                {{ $payment->order->order_number }}
                                            </a>
                                        </td>

                                        <td>
                                            {{ $payment->user->name }}
                                        </td>
                                        <td>
                                            {{ $payment->amount }}
                                        </td>
                                        <td>
                                            {{ $payment->created_at }}
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
