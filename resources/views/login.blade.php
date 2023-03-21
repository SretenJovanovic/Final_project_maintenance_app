@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="POST" {{ route('login.store') }}>
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="mt-3 alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </form>
    </div>
@endsection
