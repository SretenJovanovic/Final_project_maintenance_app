@extends('layouts.app')
@section('content')
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-4">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" value="{{ $user->username }}">
                @error('username')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="first_name">First name</label>
                <input name="first_name" type="text" class="form-control" id="first_name"
                    value="{{ $user->first_name }}">
                @error('first_name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="last_name">Last name</label>
                <input name="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
                @error('last_name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-5">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email"value="{{ $user->email }}">
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password">
                @error('password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-2">
                <label for="role">Role</label>
                <select name="role" class="form-control" id="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->type == $user->role->type ? 'selected' : '' }}>
                            {{ ucfirst($role->type) }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <button type="submit" class="m-auto col-md-4 btn btn-primary btn-lg btn-block">Update</button>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
    </form>
@endsection
