@extends('layouts.app')
@section('content')
    <h3>Assigned tickets</h3>

    <div class="mt-5"></div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Ticket ID</th>
                <th>Reported by</th>
                <th>Equipement name</th>
                <th>Ticket category</th>
                <th>Time of report</th>
                <th>Status</th>
                <th>Assign</th>
            </tr>
        </thead>
        <tbody>
            @if (count($assignedTickets) == 0)
                <tr>
                    <td colspan="8">There are no tickets.</td>
                </tr>
            @else
                @foreach ($assignedTickets as $key => $assignedTicket)
                    <tr class="table-warning">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $assignedTicket->id }}</td>
                        <td>{{ $assignedTicket->user->username }}</td>
                        <td>{{ $assignedTicket->openTicket->equipement->name }}</td>
                        <td>{{ $assignedTicket->openTicket->ticketCategory->category }}</td>
                        <td>{{ $assignedTicket->created_at->diffForHumans() }}</td>
                        <td>Assigned to {{ $assignedTicket->user->username }}</td>
                        <td>
                            <x-assigned-ticket-modal :assignedTicket="$assignedTicket" />
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
