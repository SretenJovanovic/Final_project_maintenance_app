@extends('layouts.app')
@section('content')
    <h3>List of open tickets</h3>

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
                <th>Assign</th>
            </tr>
        </thead>
        <tbody>
            @if (count($openTickets) == 0)
                <tr class="table-secondary">
                    <td colspan="7">There are no tickets.</td>
                </tr>
            @else
                @foreach ($openTickets as $key => $openTicket)
                    <tr class="table-danger">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $openTicket->id }}</td>
                        <td>{{ $openTicket->user->username }}</td>
                        <td>{{ $openTicket->equipement->name }}</td>
                        <td>{{ $openTicket->ticketCategory->category }}</td>
                        @if (now()->diffInDays($openTicket->created_at) > 0)
                            <td>{{ $openTicket->created_at }}</td>
                        @else
                            <td>{{ $openTicket->created_at->diffForHumans() }}</td>
                        @endif
                        <td>
                            <x-open-ticket-modal :openTicket="$openTicket" :technicians="$technicians" />
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
