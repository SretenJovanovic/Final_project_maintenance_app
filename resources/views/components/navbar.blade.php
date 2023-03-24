<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">HelpDesk</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            @auth('web')
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
            @guest('web')
                <a href="{{ route('login.show') }}">Login</a>
            @endguest
        </li>
    </ul>
</nav>