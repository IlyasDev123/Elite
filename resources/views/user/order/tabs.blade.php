<div class="mt-3 mb-3 ml-0">
    <a class="btn btn-outline-primary text-black {{ Route::currentRouteName() == 'orders.index' ? 'active' : '' }}"
        href="{{ route('orders.index') }}">New Orders</a>
    <a class="btn btn-outline-warning text-black {{ Route::currentRouteName() == 'orders.in-process' ? 'active' : '' }}"
        href="{{ route('orders.in-process') }}">Orders In Process</a>
    <a class="btn btn-outline-success text-black {{ Route::currentRouteName() == 'orders.payment-pending' ? 'active' : '' }}"
        href="{{ route('orders.payment-pending') }}">Payment In Pending</a>
    <a class="btn btn-outline-secondary text-black {{ Route::currentRouteName() == 'orders.shipping-process' ? 'active' : '' }}"
        href="{{ route('orders.shipping-process') }}">Order In Shipment</a>
    <a class="btn btn-outline-info text-black {{ Route::currentRouteName() == 'orders.completed' ? 'active' : '' }}"
        href="{{ route('orders.completed') }}">Completed Orders</a>
</div>
