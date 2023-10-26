<div class="mt-3 mb-3 ml-0">
    <a class="btn btn-outline-primary text-black " href="{{ route('orders.index') }}">New Orders</a>
    <a class="btn btn-outline-warning text-black" href="{{ route('orders.in-process') }}">Orders In Process</a>
    <a class="btn btn-outline-success text-black" href="{{ route('orders.payment-pending') }}">Payment In Pending</a>
    <a class="btn btn-outline-secondary text-black" href="{{ route('orders.shipping-process') }}">Order In Shipment</a>
    <a class="btn btn-outline-info text-black" href="{{ route('orders.completed') }}">Completed Orders</a>
</div>
