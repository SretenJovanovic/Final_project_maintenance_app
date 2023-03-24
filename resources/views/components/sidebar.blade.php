<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column pt-5">
            <x-navlink :href="route(auth()->user()->role->type . '.index')">
                Dashboard
                <hr>
            </x-navlink>
            <h6 class="sidebar-heading text-muted">
                <span>Tickets</span>
            </h6>
            @if (auth()->user()->role->type == 'manager')
                <x-navlink :href="route('open.ticket.index')">
                    Open tickets
                </x-navlink>
            @endif
            <x-navlink :href="route('ticket.my.show', auth()->user()->username)">
                List of my tickets
            </x-navlink>
            <x-navlink :href="route('ticket.index')">
                List of all tickets
            </x-navlink>
            <x-navlink :href="route('open.ticket.create')">
                Create new ticket
            </x-navlink>
            <hr>

            @if (auth()->user()->role->type == 'admin')
                <h6 class="sidebar-heading text-muted">
                    <span>Users</span>
                </h6>
                <x-navlink :href="route('users.index')">
                    List of users
                </x-navlink>
                <x-navlink :href="route('users.create')">
                    Create new user
                </x-navlink>
                <hr>
                <h6 class="sidebar-heading text-muted">
                    <span>Equipement</span>
                </h6>
                <x-navlink :href="route('equipements.index')">
                    Equipement list
                </x-navlink>
                <x-navlink :href="route('equipements.create')">
                    Create new equipement
                </x-navlink>
                <hr>
            @endif
        </ul>
    </div>
</nav>
