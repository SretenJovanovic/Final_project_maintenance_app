<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\AssignedTicket;
use Illuminate\Http\Request;

class AssignedTicketController extends Controller
{
    public function index()
    {
        $assignedTickets = AssignedTicket::with('user','openTicket.equipement','openTicket.ticketCategory')
            ->latest()
            ->get();
        return view('tickets.assigned.index')->with([
            'assignedTickets' => $assignedTickets,
        ]);
    }
}
