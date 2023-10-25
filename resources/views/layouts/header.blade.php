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
            <li>
                <a href="">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
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
                <a href="">Dashboard</a>
            </li>
            <li>
                <a href="">Hot Deal</a>
            </li>
            <li>
                <a href="">All Quote Records</a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}">All Order Records</a>
            </li>
            <li>
                <a href="">Invoice</a>
            </li>
            <li>
                <a href="">Profile</a>
            </li>
        </ul>
    </nav>

</header>
