@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-4 m-auto">
            <form action="" method="POST" {{ route('login.store') }}>
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
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

        <div class="col-md-4 mt-3 m-auto">
            <div class="row text-center">
                <h4>Postman API documentation</h4>
                <a class="btn btn-dark" target="_blank" href="https://documenter.getpostman.com/view/14983858/2s93RTSYHq">My API
                    documentation</a>
            </div>
            <div class="row mt-4 text-center">
                <h4>My GitHub</h4>
                <a class="btn btn-danger" target="_blank" href="https://github.com/SretenJovanovic/Final_project_maintenance_app">My
                    GitHub</a>
            </div>
            <div class="row mt-4 text-center">
                <h4>Download my project documentation</h4>
                <form class="col-md-12 p-0" action="{{ route('project.documentation') }}" method="GET">
                    @csrf
                    <button class="btn w-100 btn-success">Download</button>
                </form>
            </div>
        </div>
    </div>
@endsection
