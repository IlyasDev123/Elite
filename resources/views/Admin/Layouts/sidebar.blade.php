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
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>
        <!--Aside-Menu-->
        <div class="aside-menu px-2 my-auto flex-column-fluid">
            <nav class="flex-grow-1 h-100" id="page-navbar">
                <!--:Sidebar nav-->
                <ul class="nav flex-column collapse-group collapse d-flex pt-4">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="activity" class="fe-2x"></i>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.employees') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'admin.employees' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="user" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Employees</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.orders') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'admin.orders' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="shopping-cart" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Orders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.quotes') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'admin.quotes' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="file-plus" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Quotes</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.payments') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'admin.payments' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="dollar-sign" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Income</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="user" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Customers</span>
                        </a>
                    </li>
                    {{--
                    <li class="nav-item">
                        <a href="{{ route('pending.services') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'pending.services' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="layers" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Pending Services</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('get.user') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'get.user' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="users" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Users</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('blogs.list') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'blogs.list' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="book-open" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Blogs</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('get.reviews') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'get.reviews' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="award" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Reviews</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('get.reports') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'get.reports' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="frown" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Reports</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact-us') }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'contact-us' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i data-feather="mail" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Contact Us</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#configuration" data-bs-toggle="collapse"
                            aria-expanded="{{ Route::currentRouteName() == 'list.policies' ? 'true' : 'false' }}"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::currentRouteName() == 'list.policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? 'active' : '' }} ">
                            <span class="sidebar-icon">
                                <i data-feather="settings" class="fe-2x"></i>
                            </span>
                            <span class="sidebar-text">Configuration</span>
                        </a>
                        <ul id="configuration"
                            class="sidebar-dropdown list-unstyled {{ Route::currentRouteName() == 'policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? '' : 'collapse' }}">
                            <li class="sidebar-item"><a
                                    class="sidebar-link {{ Route::currentRouteName() == 'policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? 'active' : '' }}"
                                    href="{{ route('policies') }}">Policies</a>
                            </li>
                            <li class="sidebar-item"><a
                                class="sidebar-link {{ Route::currentRouteName() == 'policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? 'active' : '' }}"
                                href="{{ route('get.faq.categories') }}">Faq Category</a>
                            </li>
                            <li class="sidebar-item"><a
                                    class="sidebar-link {{ Route::currentRouteName() == 'policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? 'active' : '' }}"
                                    href="{{ route('faqs.list') }}">FAQs</a>
                            </li>
                            <li class="sidebar-item"><a
                                    class="sidebar-link {{ Route::currentRouteName() == 'policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? 'active' : '' }}"
                                    href="{{ route('get.states') }}">States</a>
                            </li>
                            <li class="sidebar-item"><a
                                    class="sidebar-link {{ Route::currentRouteName() == 'policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? 'active' : '' }}"
                                    href="{{ route('get.cities') }}">City</a>
                            </li>
                            <li class="sidebar-item"><a
                                    class="sidebar-link {{ Route::currentRouteName() == 'policies' || Route::currentRouteName() == 'policyView' || Route::currentRouteName() == 'policyUpdate' ? 'active' : '' }}"
                                    href="{{ route('get.categories') }}">Category</a>
                            </li>

                            <li class="sidebar-item"><a
                                class="sidebar-link"
                                href="{{ route('get.package') }}">packages</a>
                        </li>

                        </ul>
                    </li> --}}

                    <li class="nav-item">
                        <a href="{{ route('adminLogout') }}" class="nav-link d-flex align-items-center text-truncate">
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
