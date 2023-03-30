@props(['events'])
<div class="m-auto col-md-8 mt-2">
    <h4 class='text-center'>Meetings</h4>
    <table  class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Start Date/Time</th>
                <th scope="col">End Date/Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><strong>{{ $event->summary }}</strong></td>
                    <th>{{ $event->description }}</th>
                    <td>{{ $event->startDateTime }}</td>
                    <td>{{ $event->endDateTime }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>