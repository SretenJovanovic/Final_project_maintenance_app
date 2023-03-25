<?php

namespace App\Http\Controllers\Ticket;

use App\Models\Equipement;
use App\Models\ClosedTicket;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use App\Http\Controllers\Controller;

class ClosedTicketController extends Controller
{
    public function index()
    {
        $closedTickets = ClosedTicket::with('user','openTicket.equipement', 'openTicket.ticketCategory')
            ->latest()
            ->get();

        $categories = TicketCategory::select('id', 'category')->get();
        $equipements = Equipement::select('id', 'name')->get();


        return view('tickets.closed.index')->with([
            'closedTickets' => $closedTickets,
            'categories' => $categories,
            'equipements' => $equipements,
        ]);
    }
}
