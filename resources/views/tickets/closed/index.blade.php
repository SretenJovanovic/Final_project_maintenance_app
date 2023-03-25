@extends('layouts.app')
@section('content')
    <h3>List of closed tickets</h3>

    <div class="mt-5"></div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Reported by</th>
                    <th>Equipement name</th>
                    <th>Ticket category</th>
                    <th>Time expired (h:m:s)</th>
                    <th>Status</th>
                    <th>Closed by</th>
                </tr>
            </thead>
            <tbody>
                @if (count($closedTickets) == 0)
                <tr>
                    <td colspan="7">There are no tickets.</td>
                </tr>
            @else
                @foreach ($closedTickets as $closedTicket)
                    <tr>
                        <td>{{ $closedTicket->id }}</td>
                        <td>{{ $closedTicket->openTicket->user->username }}</td>
                        <td>{{ $closedTicket->openTicket->equipement->name }}</td>
                        <td>{{ $closedTicket->openTicket->ticketCategory->category }}</td>
                        
                        <td>{{ $closedTicket->openTicket->created_at->diff($closedTicket->created_at)->format('%H:%I:%S')}}</td>
                        <td>Open ticket</td>
                        <td>
                            {{ $closedTicket->user->username }}
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    @endsection