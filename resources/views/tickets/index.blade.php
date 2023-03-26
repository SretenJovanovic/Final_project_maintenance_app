@extends('layouts.app')
@section('content')
    <h3>All tickets</h3>

    <div class="mt-5"></div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th>Ticket ID</th>
                <th>Reported by</th>
                <th>Equipement name</th>
                <th>Ticket category</th>
                <th>Description</th>
                <th>Time of report</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tickets) == 0)
                <tr>
                    <td colspan="8">There are no tickets.</td>
                </tr>
            @endif
            @foreach ($tickets as $key => $ticket)
                @if ($ticket->getTable() == 'open_tickets')
                    <tr class="{{ $ticket->status ? 'table-danger' : 'table-warning' }}">
                        <td>{{ $key + 1 }}</td>
                        <td>ID: {{ $ticket->id }}</td>
                        <td>{{ $ticket->user->username }}</td>
                        <td>{{ $ticket->equipement->name }}</td>
                        <td>{{ $ticket->ticketCategory->category }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($ticket->status)
                                <span class="badge text-bg-danger">Open</span>
                            @else
                                <span class="badge text-bg-warning">Assigned</span>
                            @endif
                        </td>
                    </tr>
                @elseif ($ticket->getTable() == 'closed_tickets')
                    <tr class="table-success">
                        <td>{{ $key + 1 }}</td>
                        <td>ID: {{ $ticket->id }}</td>
                        <td>{{ $ticket->openTicket->user->username }}</td>
                        <td>{{ $ticket->openTicket->equipement->name }}</td>
                        <td>{{ $ticket->openTicket->ticketCategory->category }}</td>
                        <td>{{ $ticket->openTicket->description }}</td>
                        <td>{{ $ticket->openTicket->created_at->diffForHumans() }}</td>
                        <td><span class="badge text-bg-success">Closed</span></td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
