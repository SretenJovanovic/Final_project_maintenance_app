@extends('layouts.app')
@section('content')
    <div>
        <h4>My tickets:</h4>

        @if (count($tickets) == 0)
            <h6>There are no tickets assigned.</h6>
        @else
            @foreach ($tickets as $ticket)
                <div class="m-2 card text-left">
                    <form action="{{ route('assigned.ticket.close', $ticket->id) }}" method="POST">
                        @csrf
                        <div class="card-header">
                            Ticket ID: <strong>{{ $ticket->openTicket->id }}</strong>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body">
                                    <h5 class="card-title">Equipement: {{ $ticket->openTicket->equipement->name }}</h5>
                                    <p class="card-text my-1 py-2">Ticket category:
                                        <strong>{{ $ticket->openTicket->ticketCategory->category }}</strong></p>
                                    <p class="card-text">Reported by
                                        <strong>{{ $ticket->openTicket->user->username }}</strong></p>
                                </div>
                            </div>
                            <div class="col-md-4 border-start border-2">
                                <div class="card-body">
                                    <h5 class="card-title">Description:</h5>
                                    <p class="card-text">Description: {{ $ticket->openTicket->description }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-start border-2">
                                <div class="card-body">
                                    <div class="form-floating">
                                        
                                        <textarea name="description" class="form-control" style="height: 100px" placeholder="Leave a description here"
                                            id="description"></textarea>
                                        <label for="description">Solution description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-body-secondary row mx-0">
                            <p class="card-text col-md-4">Assigned {{ $ticket->created_at->diffForHumans() }}</p>
                            <div class="col-md-4 position-relative">
                                @error('description')
                                    <div class="position-absolute alert alert-warning alert-dismissible fade show"
                                        role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="submit" class="btn btn-success">Close ticket</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
@endsection
