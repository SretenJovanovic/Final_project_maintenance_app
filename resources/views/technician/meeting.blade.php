@extends('layouts.app')
@section('content')
<x-meeting-table :events="$events"/>

@endsection