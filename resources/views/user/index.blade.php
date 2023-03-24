@extends('layouts.app')
@section('content')
<h3>List of users</h3>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->type }}</td>
                    <td>
                        <form action="{{ route('users.show', $user->id) }}" method="GET">
                            <button type="submit" class="btn btn-info">Show Profile</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
