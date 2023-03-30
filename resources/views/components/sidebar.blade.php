<div class="col-md-2"></div>
<nav class="col-md-2 sidebar" id="sidebar">
    <div class="sidebar-sticky">
        <ul class="nav nav-tabs flex-column pt-3">
            <x-navlink :href="route(auth()->user()->role->type . '.index')">
                @if (auth()->user()->role->type == 'technician')
                    Tickets
                @elseif(auth()->user()->role->type == 'admin')
                    Add Ticket Category
                    @elseif(auth()->user()->role->type == 'manager')
                    Set a meeting
                @else
                    Dashboard
                @endif

                {{-- Badge with number of assigned tickets if there are any --}}
                @if (auth()->user()->role->type == 'technician' && \App\Models\AssignedTicket::get()->count() != 0)
                    @if (\App\Models\AssignedTicket::where('user_id', auth()->user()->id)->get()->count() != 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ \App\Models\AssignedTicket::where('user_id', auth()->user()->id)->get()->count() }}
                            <span class="visually-hidden">Assigned tickets</span>
                        </span>
                    @endif
                @endif
            </x-navlink>
            @if (auth()->user()->role->type == 'technician')
                <x-navlink :href="route('technician.meeting')">
                    Meetings
                </x-navlink>
            @endif
            <x-navlink :href="route('homepage')">
                Holidays
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
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ \App\Models\OpenTicket::where('status', 1)->get()->count() }}
                            <span class="visually-hidden">Assigned tickets</span>
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
                My reported tickets
            </x-navlink>
            <x-navlink :href="route('ticket.index')">
                All tickets
            </x-navlink>

            @if (auth()->user()->role->type == 'admin' || auth()->user()->role->type == 'manager')
                <h6 class="sidebar-heading text-muted">
                    <span>Users</span>
                </h6>
                <x-navlink :href="route('users.index')">
                    Users
                </x-navlink>
                <x-navlink :href="route('users.create')">
                    Create new user
                </x-navlink>
                <h6 class="sidebar-heading text-muted">
                    <span>Equipement</span>
                </h6>
                <x-navlink :href="route('equipements.index')">
                    Equipement list
                </x-navlink>
                <x-navlink :href="route('equipements.create')">
                    Create new equipement
                </x-navlink>
            @endif
        </ul>
    </div>
</nav>
