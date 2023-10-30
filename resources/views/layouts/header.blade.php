<header class="main__header">

    <div class="top__bar">
        <div class="search__form">
            <input type="text" placeholder="Search...">
            <button class="search__btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        <ul class="main__icon">
            <li>
                <a href="">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    <span>Help</span>
                </a>
            </li>
            <li id="notificationLink">
                <a href="#" class="position-relative">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
                <ul class="notification__list" id="notificationList">
                    <li>Notification</li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </a>
            </li>
            <li class="dropdown setting">
                <a href="#" id="dropdown-toggle">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </a>
                <ul class="dropdown__menu">
                    <li><a href="#"> Profile</a></li>
                    <li><a href="#">Settign</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
    <nav class="main__menu">
        <ul>
            <li>
                <a href="{{ route('user.dashboard') }}"
                    class="{{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('quotes.create') }}"
                    class="{{ Route::currentRouteName() == 'quotes.create' ? 'active' : '' }}">Custom Patch</a>
            </li>
            <li>
                <a href="{{ route('emborided-patches') }}"
                    class="{{ Route::currentRouteName() == 'emborided-patches' ? 'active' : '' }}">Custom Clothing</a>
            </li>
            <li>
                <a href="{{ route('quotes.index') }}"
                    class="{{ Route::currentRouteName() == 'quotes.index' ? 'active' : '' }}">All Quote Records</a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}"
                    class="{{ Route::currentRouteName() == 'orders.index' ? 'active' : '' }}">All Order Records</a>
            </li>
            <li>
                <a href="">Invoice</a>
            </li>

        </ul>
    </nav>

</header>

@section('scripts-js')
    <script>
        $(document).ready(function() {

            $('#notificationLink').click(function(event) {
                $('.notification__list').toggle();
                if ($('.notification__list').is(':visible')) {
                    getNotifications(); // Call the function only if the list is visible
                }
            });

            function getNotifications() {
                $.ajax({
                    url: "{{ route('notifications') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log("response data", response);
                        var notifications = response;

                        // Clear existing notifications
                        $('#notificationLink ul').empty();

                        // Add fetched notifications to the list
                        notifications.forEach(function(notification) {
                            $('#notificationLink ul').append('<li class="m-2">' + notification
                                .content + '</li><hr>');
                        });
                    }
                });
            }


        });
        // Get notifications every 5 seconds
    </script>
@endsection
