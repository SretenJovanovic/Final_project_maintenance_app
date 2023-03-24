@extends('layouts.app')
@section('content')
    <h3>Open new ticket</h3>

    <x-create-ticket-form :categories="$categories" :equipements="$equipements"/>

    @endsection
