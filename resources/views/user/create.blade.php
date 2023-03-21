@extends('layouts.app')
@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" value="{{ old('username') }}"
                    placeholder="Example input">
                @error('username')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="first_name">First name</label>
                <input name="first_name" type="text" class="form-control" id="first_name" value="{{ old('first_name') }}"
                    placeholder="Another input">
                @error('first_name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="last_name">Last name</label>
                <input name="last_name" type="text" class="form-control" value="{{ old('last_name') }}" id="last_name"
                    placeholder="Another input">
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
                <input name="email" type="email" class="form-control" id="email"
                    value="{{ old('email') }}"placeholder="Another input">
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Another input">
                @error('password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="role">Role</label>
                <select name="role" class="form-control" id="role">
                    <option disabled selected>Choose role...</option>
                    <option value="1">Admin</option>
                    <option value="2">Operator</option>
                    <option value="3">Technician</option>
                </select>
                @error('role')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <button type="submit" class="m-auto col-md-4 btn btn-primary btn-lg btn-block">Add User</button>
        </div>
    </form>
@endsection
