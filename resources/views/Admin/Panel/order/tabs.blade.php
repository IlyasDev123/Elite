<div class="mt-3 mb-3 ml-0 tab-button">
    <a class="btn btn-primary {{ Route::currentRouteName() == 'admin.orders' ? 'active' : '' }}"
        href="{{ route('admin.orders') }}">New Orders</a>
    <a class="btn btn-warning {{ Route::currentRouteName() == 'admin.orders.assigned' ? 'active' : '' }}"
        href="{{ route('admin.orders.assigned') }}">Assign Orders</a>
    <a class="btn btn-success {{ Route::currentRouteName() == 'admin.orders.ready' ? 'active' : '' }}"
        href="{{ route('admin.orders.ready') }}">Ready Orders</a>
    <a class="btn btn-info {{ Route::currentRouteName() == 'admin.orders.shipment' ? 'active' : '' }}"
        href="{{ route('admin.orders.shipment') }}">Shipment</a>
    <a class="btn btn-info {{ Route::currentRouteName() == 'admin.orders.completed' ? 'active' : '' }}"
        href="{{ route('admin.orders.completed') }}">Completed Orders</a>
</div>
