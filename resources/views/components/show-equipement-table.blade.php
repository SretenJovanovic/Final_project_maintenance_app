@props(['equipement'])
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Name</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Section</th>
            <th>Serial</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $equipement->id }}</td>
            <td>{{ $equipement->name }}</td>
            <td>{{ $equipement->manufacturer }}</td>
            <td>{{ $equipement->model }}</td>
            <td>{{ $equipement->section->name }}</td>
            <td>{{ $equipement->serial }}</td>
            <td>{{ $equipement->description }}</td>
            <td>{{ $equipement->status }}</td>
        </tr>
    </tbody>
</table>

<div class="row">
    <form class="col-md-6" action="{{ route('equipements.edit', $equipement->id) }}" method="GET">
        <button type="submit" class="btn btn-success">Edit Equipement</button>
    </form>
    @if (auth()->user()->role->type == 'admin')
        <form class="col-md-6" action="{{ route('equipements.destroy', $equipement->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Equipement</button>
        </form>
    @endauth
</div>
