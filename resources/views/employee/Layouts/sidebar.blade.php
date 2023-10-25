<!--///////////Page sidebar begin///////////////-->
<aside class="page-sidebar aside-dark bg-dark">
    <div class="h-100 flex-column d-flex" data-simplebar>

        <!--Aside-logo-->
        <div class="user-panel mt-3" style="text-align: center;">
            <div class="image mb-2" style="display: block; width: 100%;">
                <a href="{{ route('dashboard') }}"><img src="{{ asset('images/logo.png') }}"
                        class="brand-image img-circle elevation-3"
                        style="width: 70%;
                    max-width: 200px;
                    border-radius: 0;
                    box-shadow: none;"></a>
            </div>
            <div class="info" style="pointer-events: none;">
                <a href="#" class="d-block"></a>
            </div>
        </div>
        <!--Aside-Menu-->
        <div class="aside-menu px-2 my-auto flex-column-fluid">
            <nav class="flex-grow-1 h-100" id="page-navbar">
                <!--:Sidebar nav-->
                <ul class="nav flex-column collapse-group collapse d-flex pt-4">

                    <li class="nav-item">
                        <a href="{{ route('employee.dashboard') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="activity" class="fe-2x"></i>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('employee.orders') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'orders' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="bar-chart" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Orders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('employ.logout') }}" class="nav-link d-flex align-items-center text-truncate">
                            <span class="sidebar-icon">
                                <i data-feather="log-out" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Sign out</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</aside>
