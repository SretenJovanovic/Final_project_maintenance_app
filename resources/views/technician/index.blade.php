@extends('layouts.app')
@section('content')
  <h1>Technician</h1>

  <div>
    <h3>My tickets:</h3>

    @foreach ($tickets as $ticket)
      <p>Ticket id <strong>{{ $ticket->id }}</strong></p>
      <hr>
    @endforeach
  </div>
@endsection
