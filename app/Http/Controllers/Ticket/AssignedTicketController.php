<?php

namespace App\Http\Controllers\Ticket;

use App\Models\ClosedTicket;
use Illuminate\Http\Request;
use App\Models\AssignedTicket;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\ClosedTicketService;

class AssignedTicketController extends Controller
{
    public function index()
    {
        $assignedTickets = AssignedTicket::with('user', 'openTicket.equipement', 'openTicket.ticketCategory')
            ->latest()
            ->get();
        return view('tickets.assigned.index')->with([
            'assignedTickets' => $assignedTickets,
        ]);
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

            return redirect()->route('closed.ticket.index')->withSuccess('Ticket closed succesfully.');
        }
        return redirect()->back();
    }
}
