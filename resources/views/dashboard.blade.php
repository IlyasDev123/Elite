@extends('layouts.app')
@section('content')
    <div class="site__container custom__card">
        <div class="main__content">
            {{-- <h1 class="text__center">What Would You Like To Order?</h1> --}}

            <div class="row mt-3">
                <div class="col-md-2 col-sm-4">
                    <div class="statistic__card">
                        <a href="{{ route('orders.index') }}" class="text-wrap">
                            <h2 class="mb-2">Total Orders</h2>
                            <p>
                                {{ $orders['total'] }}
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="statistic__card">
                        <a href="{{ route('orders.index') }}">
                            <h2>New Orders</h2>
                            <p> {{ $orders['new'] }}</p>
                        </a>
                    </div>

                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="statistic__card">
                        <a href="{{ route('orders.in-process') }}">
                            <h2>Processing Orders</h2>
                            <p> {{ $orders['processing'] }}</p>
                        </a>
                    </div>

                </div>

                <div class="col-md-2 col-sm-4">
                    <div class="statistic__card">
                        <a href="{{ route('orders.payment-pending') }}">
                            <h2>Payment Pending</h2>
                            <p> {{ $orders['processing'] }}</p>
                        </a>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4">
                    <div class="statistic__card">
                        <a href="{{ route('orders.shipping-process') }}">
                            <h2>Shipping Orders</h2>
                            <p>{{ $orders['shipment'] }}</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="statistic__card">
                        <a href="{{ route('orders.completed') }}">
                            <h2>Completed Orders</h2>
                            <p> {{ $orders['completed'] }}</p>
                        </a>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col-md-3 col-sm-4">
                        <div class="statistic__card">
                            <a href="{{ route('quotes.index') }}">
                                <h2>Total Quotations</h2>
                                <p>{{ $quotes['total'] }}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="statistic__card">
                            <a href="{{ route('quotes.index', ['status' => 'Payment_pending']) }}">
                                <h2>Payment Pending</h2>
                                <p>{{ $quotes['payment_pending'] }}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="statistic__card">
                            <a href="{{ route('quotes.index', ['status' => 'Accepted']) }}">
                                <h2>Accepted Quotations</h2>
                                <p>{{ $quotes['accepted'] }}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="statistic__card">
                            <a href="{{ route('quotes.index', ['status' => 'Rejected']) }}">
                                <h2>Rejected Quotations</h2>
                                <p>{{ $quotes['rejected'] }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
