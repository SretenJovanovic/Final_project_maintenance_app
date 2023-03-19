@extends('layouts.app')
@section('content')
<h1>
    {{ $user->role->type }}
</h1>
@endsection