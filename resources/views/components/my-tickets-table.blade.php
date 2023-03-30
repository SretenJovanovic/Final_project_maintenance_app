<h3>My tickets</h3>
<div class="mt-5"></div>
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th>Ticket ID</th>
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
                <td colspan="7">You have not reported any ticket.</td>
            </tr>
        @endif
        @foreach ($tickets as $key => $ticket)
            <tr>
                <th>{{ $key + 1 }}</th>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->user->username }}</td>
                <td>{{ $ticket->equipement->name }}</td>
                <td>{{ $ticket->ticketCategory->category }}</td>
                <td>{{ $ticket->description }}</td>
                @if (now()->diffInDays($ticket->created_at) > 0)
                    <td>{{ $ticket->created_at }}</td>
                @else
                    <td>{{ $ticket->created_at->diffForHumans() }}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
