<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column pt-5">
            <x-navlink :href="route(auth()->user()->role->type . '.index')">
                Dashboard
                @if (auth()->user()->role->type == 'technician' && \App\Models\AssignedTicket::get()->count() != 0)
                    <span class="badge text-bg-danger">
                        {{ \App\Models\AssignedTicket::get()->count() }}
                    </span>
                @endif
                <hr>
            </x-navlink>
            <h6 class="sidebar-heading text-muted">
                <span>Tickets</span>
            </h6>
            <x-navlink :href="route('open.ticket.create')">
                Create new ticket
            </x-navlink>
            @if (auth()->user()->role->type == 'manager')
                <x-navlink :href="route('open.ticket.index')">
                    Open tickets
                    @if (\App\Models\OpenTicket::where('status', 1)->get()->count() != 0)
                        <span class="badge text-bg-danger">
                            {{ \App\Models\OpenTicket::where('status', 1)->get()->count() }}
                        </span>
                    @endif
                </x-navlink>
            @endif
            <x-navlink :href="route('assigned.ticket.index')">
                Assigned tickets
            </x-navlink>
            <x-navlink :href="route('closed.ticket.index')">
                Closed tickets
            </x-navlink>
            <x-navlink :href="route('ticket.my.show', auth()->user()->username)">
                List of my tickets
            </x-navlink>
            <x-navlink :href="route('ticket.index')">
                List of all tickets
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
