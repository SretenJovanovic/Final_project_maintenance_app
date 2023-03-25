@extends('layouts.app')
@section('content')
    <div>
        <h3>My tickets:</h3>

        @if(count($tickets) == 0)
            <h6>There are no tickets assigned.</h6>
        @else
        @foreach ($tickets as $ticket)
            <div class="m-2 card text-left">
                <form action="{{ route('assigned.ticket.close', $ticket->id) }}" method="POST">
                    @csrf
                    <div class="card-header">
                        Ticket: {{ $ticket->openTicket->id }}
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Equipement: {{ $ticket->openTicket->equipement->name }}</h5>
                                <p class="card-text">Description: {{ $ticket->openTicket->description }}</p>
                                <p class="card-text">Reported by {{ $ticket->openTicket->user->username }}.Assigned</p>
                            </div>
                        </div>
                        <div class="col-md-4 border-start border-2">
                            <div class="card-body">
                                <h5 class="card-title">Comments:</h5>
                                
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A fourth item</li>
                                <li class="list-group-item">And a fifth one</li>
                            </div>
                        </div>
                        <div class="col-md-4 border-start border-2">
                            <div class="card-body">
                                <div class="form-floating">
                                    <textarea name="description" class="form-control" style="height: 100px" placeholder="Leave a description here" id="description"></textarea>
                                    <label for="description">Solution description</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-body-secondary row align-itmes">
                        <p class="card-text col-md-6">Assigned {{ $ticket->created_at->diffForHumans() }}</p>
                        <div class="col-md-6 text-end">
                            <button type="submit" class="btn btn-success">Close ticket</button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
        @endif
    </div>
@endsection
