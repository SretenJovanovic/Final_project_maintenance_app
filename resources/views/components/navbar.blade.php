<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    @auth('web')
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route(auth()->user()->role->type . '.index') }}">HelpDesk</a>
    @endauth
    @guest('web')
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">HelpDesk</a>
    @endguest
    @auth('web')
        <ul class="navbar-nav px-3 flex-row w-50 justify-content-between">
            <li class="nav-item text-nowrap text-white h4">
                Welcome <span class="text-primary">{{ auth()->user()->username }}</span>
            </li>
            <li class="nav-item text-nowrap">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-md btn-outline-secondary mx-3">Logout</button>
                </form>
        </ul>
    @endauth
    @guest('web')
        <a href="{{ route('login.show') }}" class="btn btn-md btn-outline-secondary mx-5">Login</a>
    @endguest
    </li>
</nav>
