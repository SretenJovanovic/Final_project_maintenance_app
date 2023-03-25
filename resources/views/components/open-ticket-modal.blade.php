@props(['openTicket','technicians'])
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $openTicket->id }}">
    Details
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="{{ $openTicket->id }}" tabindex="-1" aria-labelledby="{{ $openTicket->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">

      {{-- FORM --}}
        <form action="{{ route('open.ticket.assign') }}" method="POST">
          @csrf
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="{{ $openTicket->id }}Label">Report ID: {{ $openTicket->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Reported by: <strong>{{ $openTicket->user->username }}</strong></p>
                    <p>Equipement name: <strong>{{ $openTicket->equipement->name }}</strong></p>
                    <p>Ticket category: <strong>{{ $openTicket->ticketCategory->category }}</strong></p>
                    <p>Description: <strong>{{ $openTicket->description }}</strong></p>
                    <div class="form-group col-md-2">
                      <input type="hidden" name="openTicketId" value="{{ $openTicket->id }}">
                        <label for="technician">Assign to:</label>
                        <select name="technician" class="form-control" id="technician">
                            @foreach ($technicians as $technician)
                                <option value="{{ $technician->id }}">
                                    {{ ucfirst($technician->first_name) }} {{ ucfirst($technician->last_name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('technician')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Assign
                        report</button>
                </div>
            </div>
        </form>


    </div>
</div>
