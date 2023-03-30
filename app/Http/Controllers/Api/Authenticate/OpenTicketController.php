<?php

namespace App\Http\Controllers\Api\Authenticate;

use App\Models\OpenTicket;
use App\Models\ClosedTicket;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\AssignedTicket;
use Illuminate\Validation\Rule;
use App\Services\OpenTicketService;
use App\Http\Controllers\Controller;
use App\Services\AssignTicketService;
use App\Services\ClosedTicketService;
use App\Http\Resources\OpenTicketResource;
use App\Http\Requests\OpenTicketStoreRequest;

class OpenTicketController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OpenTicketResource::collection(
            OpenTicket::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpenTicketStoreRequest $request)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }

        $openTicket = new OpenTicket();
        $openTicketService = new OpenTicketService();
        $openTicketService->storeTicket($request, $openTicket);


        return new OpenTicketResource($openTicket);
    }

    /**
     * Display the specified resource.
     */
    public function show(OpenTicket $openTicket)
    {
        return new OpenTicketResource($openTicket);
    }


    public function assign(Request $request)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }
        $validated = $request->validate([
            'openTicketId' => ['required', 'integer', 'max:255', Rule::exists('open_tickets', 'id')],
            'technician' => ['required', 'integer', 'max:255', Rule::exists('users', 'id')],
        ]);

        if ($validated) {
            $assignedTicket = new AssignedTicket();

            $assignedTicketService = new AssignTicketService();
            $assignedTicketService->assignTicket($request, $assignedTicket);
        }
        return $this->success('', 'Ticket assigned.', 200);
    }

    public function close(Request $request, AssignedTicket $assignedTicket)
    {
        $request->merge(["user_id" => $assignedTicket->user->id]);
        $request->merge(["open_ticket_id" => $assignedTicket->openTicket->id]);
        $request->merge(["equipement_id" => $assignedTicket->openTicket->equipement->id]);
        $request->merge(["assigned_ticket_id" => $assignedTicket->id]);

        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'max:255', Rule::exists('users', 'id')],
            'open_ticket_id' => ['required', 'integer', 'max:255', Rule::exists('open_tickets', 'id')],
            'equipement_id' => ['required', 'integer', 'max:255', Rule::exists('equipements', 'id')],
            'assigned_ticket_id' => ['required', 'integer', 'max:255', Rule::exists('assigned_tickets', 'id')],
            'description' => ['required', 'string', 'min:3', 'max:1000'],
        ]);

        if ($validated) {
            $closedTicket = new ClosedTicket();

            $closedTicketService = new ClosedTicketService();
            $closedTicketService->closeTicket($request, $closedTicket);

            return $this->success('', 'Ticket closed successfully.', 200);
        }
        return $this->error('', 'Not modified.', 304);
    }
    private function isAuthorized()
    {

        if (auth()->user()->role->type != 'admin' && auth()->user()->role->type != 'manager') {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
