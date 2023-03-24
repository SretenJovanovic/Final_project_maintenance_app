@extends('layouts.app')
@section('content')
    <h3>List of open tickets</h3>

    <div class="mt-5"></div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Reported by</th>
                    <th>Equipement name</th>
                    <th>Ticket category</th>
                    <th>Description</th>
                    <th>Time of report</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($openTickets as $openTicket)
                    <tr>
                        <td>{{ $openTicket->id }}</td>
                        <td>{{ $openTicket->user->username }}</td>
                        <td>{{ $openTicket->equipement->name }}</td>
                        <td>{{ $openTicket->ticketCategory->category }}</td>
                        <td>{{ $openTicket->description }}</td>
                        <td>{{ $openTicket->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
