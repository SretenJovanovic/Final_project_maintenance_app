@extends('layouts.app')
@section('content')
    <x-my-tickets-table :tickets="$tickets" />
@endsection