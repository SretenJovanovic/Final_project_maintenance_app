@extends('layouts.app')

@section('content')
    <x-show-user-profile-table :user="$user" :role="$role"/>
@endsection
