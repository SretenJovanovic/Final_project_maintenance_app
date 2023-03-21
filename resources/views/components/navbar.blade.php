<a href="{{ route('home') }}">Home</a>
@auth('web')
    
    <x-navlink :href="route(auth()->user()->role->type . '.index')">
        Dashboard
    </x-navlink>

    @if (auth()->user()->role->type == 'admin')
        <x-navlink :href="route('users.index')">
            Users
        </x-navlink>
    @endif
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

@endauth

@guest('web')
    <a href="{{ route('login.show') }}">Login</a>
@endguest
