@props(['user','role'])
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $role }}</td>
        </tr>
    </tbody>
</table>

<div class="row">
    <form class="col-md-6" action="{{ route('users.edit', $user->id) }}" method="GET">
        <button type="submit" class="btn btn-success">Edit Profile</button>
    </form>
    @if (auth()->user()->role->type == 'admin')
        <form class="col-md-6" action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Profile</button>
        </form>
    @endauth
</div>
