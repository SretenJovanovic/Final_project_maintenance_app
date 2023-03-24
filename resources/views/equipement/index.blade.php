
@extends('layouts.app')
@section('content')
    

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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipements as $equipement)
                <tr>
                    <td>{{ $equipement->id }}</td>
                    <td>{{ $equipement->name}}</td>
                    <td>{{ $equipement->manufacturer }}</td>
                    <td>{{ $equipement->model }}</td>
                    <td>{{ $equipement->section->name }}</td>
                    <td>{{ $equipement->serial }}</td>
                    <td>{{ $equipement->description }}</td>
                    <td>{{ $equipement->status }}</td>
                    <td>
                        <form action="{{ route('equipements.show',$equipement->id) }}" method="GET">
                            <button type="submit" class="btn btn-info">Show Equipement</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
