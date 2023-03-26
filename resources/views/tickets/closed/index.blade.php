@extends('layouts.app')
@section('content')
    <h3>Closed tickets</h3>

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
                <th>Time expired (h:m:s)</th>
                <th>Closed by</th>
            </tr>
        </thead>
        <tbody>
            @if (count($closedTickets) == 0)
                <tr>
                    <td colspan="8">There are no tickets.</td>
                </tr>
            @else
                @foreach ($closedTickets as $key => $closedTicket)
                    <tr class="table-success">
                        <td>{{ $key + 1 }}</td>
                        <td>ID: {{ $closedTicket->id }}</td>
                        <td>{{ $closedTicket->openTicket->user->username }}</td>
                        <td>{{ $closedTicket->openTicket->equipement->name }}</td>
                        <td>{{ $closedTicket->openTicket->ticketCategory->category }}</td>
                        <td>{{ $closedTicket->solution_description }}</td>
                        <td>
                            {{ $closedTicket->openTicket->created_at->diff($closedTicket->created_at)->format('%H:%I:%S') }}
                        </td>
                        <td>{{ $closedTicket->user->username }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
