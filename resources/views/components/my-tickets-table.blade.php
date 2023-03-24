<h3>My tickets</h3>
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
        @if (count($tickets) == 0)
            <tr>
                <td colspan="6">There are no tickets for this user.</td>
            </tr>
        @endif
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->user->username }}</td>
                <td>{{ $ticket->equipement->name }}</td>
                <td>{{ $ticket->ticketCategory->category }}</td>
                <td>{{ $ticket->description }}</td>
                <td>{{ $ticket->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
