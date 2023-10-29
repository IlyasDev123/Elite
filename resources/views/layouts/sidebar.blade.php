<ul class="sidebar__btns">
    <li class="has__drowdown">
        <a href="{{ route('user.dashboard') }}"
            class="{{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}">
            <span class="large-text">Dashboard</span>
        </a>
    </li>
    <li class="has__drowdown">
        <a href="{{ route('quotes.create') }}" class="{{ Route::currentRouteName() == 'quotes.create' ? 'active' : '' }}">
            <span class="large-text">Custom Patch</span>
            <span class="sub-text">Woven labels/Accessories</span>
        </a>
        {{-- <ul class="sub__menu">
            <li><a href="">Quotes</a></li>
            <li><a href="{{ route('quotes.create') }}">Create</a></li>
        </ul> --}}
    </li>
    <li class="has__drowdown">
        <a href="{{ route('orders.create') }}"
            class="{{ Route::currentRouteName() == 'orders.create' ? 'active' : '' }}">
            <span class="large-text">Digitizing/Vector</span>
        </a>
        {{-- <ul class="sub__menu">
            <li><a href="{{ route('orders.index') }}">Order List</a></li>
            <li><a href="{{ route('orders.create') }}">New Order</a></li>
        </ul> --}}
    </li>
    <li class="has__drowdown">
        <a href="{{ route('emborided-patches') }}"
            class="{{ Route::currentRouteName() == 'emborided-patches' ? 'active' : '' }}">
            <span class="large-text">Custom Clothing</span>
        </a>
        {{-- <ul class="sub__menu">
            <li><a href="">Order List</a></li>
            <li><a href="{{ route('emborided-patches') }}">New Qutoes</a></li>
        </ul> --}}
    </li>

    {{-- <li class="has__drowdown">
        <a href="">
            <span class="large-text">Custom Patch</span>
        </a>
        <ul class="sub__menu">
            <li><a href="">Item 1</a></li>
            <li><a href="">Item 2</a></li>
            <li><a href="">Item 3</a></li>
        </ul>
    </li> --}}


</ul>
