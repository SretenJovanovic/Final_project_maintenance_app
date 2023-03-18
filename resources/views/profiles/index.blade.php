@extends('layouts.app')
@section('content')
@foreach ($profiles as $profile)
    
@if ($profile->isAdmin())
<h1>Username</h1>
<p>{{ $profile->username }}</p>
<h1>Role</h1>
<p>{{ $profile->role['role'] }}</p>
<h1>User email</h1>
<p>{{ $profile->user['email'] }}</p>
@else
Nije
@endif
@endforeach
@endsection