@extends('layouts.app')
@section('content')
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Username</th>
                <th>Role</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Adress</th>
                <th>City</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->profile->username }}</td>
                    <td>{{ $user->role->type }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile->first_name }}</td>
                    <td>{{ $user->profile->last_name }}</td>
                    <td>{{ $user->userContactInfo->city }}</td>
                    <td>{{ $user->userContactInfo->adress }}</td>
                    <td>{{ $user->userContactInfo->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
