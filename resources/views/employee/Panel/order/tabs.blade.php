<div class="mt-3 mb-3 ml-0 tab-button">
    <a class="btn btn-primary {{ Route::currentRouteName() == 'employee.orders' ? 'active' : '' }}"
        href="{{ route('employee.orders') }}">New Orders</a>
    <a class="btn btn-info {{ Route::currentRouteName() == 'employee.orders.completed' ? 'active' : '' }}"
        href="{{ route('employee.orders.completed') }}">Completed Orders</a>
</div>
