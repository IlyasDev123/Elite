@extends('Admin.Layouts.master')

@section('content')
    <div class="container-fluid card">
        <div class="m-3">
            <h2 class="">Quotes List</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle">
                            <thead class="text-uppercase text-bold">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotes as $quote)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quote->product->name }}</td>
                                        <td>{{ $quote->product->product_category }}</td>
                                        <td>Physical Product</td>
                                        <td>{{ $quote->product->product_quantity }}</td>
                                        <th>
                                            @switch($quote->status)
                                                @case(1)
                                                    <span class="badge bg-warning">Pending</span>
                                                @break

                                                @case(2)
                                                    <span class="badge bg-primary">Payment Pending</span>
                                                @break

                                                @case(3)
                                                    <span class="badge bg-success">Accepted</span>
                                                @break

                                                @case(4)
                                                    <span class="badge bg-danger">Rejected</span>
                                                @break

                                                @default
                                            @endswitch
                                        </th>
                                        <td>
                                            <a href="{{ route('admin.quotes.show', $quote->id) }}">
                                                <i class="fa fa-eye"></i></a>

                                            @if ($quote->status == 1)
                                                <a href="#" data-bs-toggle="modal" class="detail-quote"
                                                    data-bs-target="#detailQuote" data-id="{{ $quote->id }}"
                                                    data-bs-toggle="tooltip" data-price="{{ $quote->price }}">

                                                    <i class="fa fa-money-bill"></i>
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

    @isset($quotes)
        @include('Admin.Panel.quotes.price-modal', ['quote' => $quote])
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
