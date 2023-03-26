@extends('layouts.app')
@section('content')
    <h3>Equipement</h3>

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th scope="col">#</th>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Section</th>
                <th>Serial</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($equipements as $key => $equipement)
                <tr class={{ $equipement->status ? 'table-success' : 'table-danger' }}>
                    <td>{{ $equipement->id }}</td>
                    <td>{{ $equipement->name }}</td>
                    <td>{{ $equipement->manufacturer }}</td>
                    <td>{{ $equipement->model }}</td>
                    <td>{{ $equipement->section->name }}</td>
                    <td>{{ $equipement->serial }}</td>
                    <td>{{ $equipement->description }}</td>
                    <td>{{ $equipement->status }}</td>
                    <td>
                        <form action="{{ route('equipements.show', $equipement->id) }}" method="GET">
                            <button type="submit" class="btn btn-info">Show Equipement</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center my-4">
        {{ $equipements->links() }}
    </div>
@endsection
