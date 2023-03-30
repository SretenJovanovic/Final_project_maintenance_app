<?php

namespace App\Http\Controllers;

use App\Models\ClosedTicket;
use App\Models\User;
use App\Models\Equipement;
use App\Models\OpenTicket;
use Illuminate\Http\Request;
use App\Models\TicketCategory;

class TicketController extends Controller
{
    public function index()
    {

        $openTickets = OpenTicket::with('user')
            ->latest()
            ->get();

        $closedTickets = ClosedTicket::with('openTicket.equipement', 'openTicket.ticketCategory')
            ->latest()
            ->get();
        $tickets = $openTickets->merge($closedTickets);
        

        return view('tickets.index')->with([
            'tickets' => $tickets,
        ]);
    }
    public function myTickets(User $user)
    {
        $tickets = OpenTicket::where('user_id', $user->id)->with('ticketCategory')->latest()->get();
        return view('tickets.my_tickets')->with([
            'tickets' => $tickets
        ]);
    }
}
