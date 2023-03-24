@extends('layouts.app')
@section('content')
 

@foreach ($openTickets as $openTicket)
    {{ $openTicket->user->username }}
    <hr>
    {{ $openTicket->equipement->name }}
    <hr>
    {{ $openTicket->ticketCategory->category }}
    <hr>
@endforeach

@endsection
