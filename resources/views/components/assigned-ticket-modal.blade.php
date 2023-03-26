@props(['assignedTicket'])
<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Details
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">

            <div class="modal-content text-black">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Report ID: {{ $assignedTicket->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Reported by: <strong>{{ $assignedTicket->user->username }}</strong></p>
                    <p>Equipement name: <strong>{{ $assignedTicket->openTicket->equipement->name }}</strong></p>
                    <p>Ticket category: <strong>{{ $assignedTicket->openTicket->ticketCategory->category }}</strong></p>
                    <p>Description: <strong>{{ $assignedTicket->openTicket->description }}</strong></p>
                    <p>Assigned to <strong>{{ $assignedTicket->user->username }}</strong> {{ $assignedTicket->created_at->diffForHumans() }}.</p>
                    <div class="form-group col-md-2">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </form>


    </div>
</div>
