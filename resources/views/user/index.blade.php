@extends('layouts.app')
@section('content')
    <h3>Users</h3>

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th scope="col">#</th>
                <th>User</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://xsgames.co/randomusers/assets/avatars/male/{{ $user->id }}.jpg"
                                alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $user->first_name }} {{ $user->last_name }}</p>
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{ $user->username }}</td>
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

    <div class="d-flex justify-content-center my-4">
        {{ $users->links() }}
    </div>
@endsection
