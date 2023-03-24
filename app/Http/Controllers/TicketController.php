<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Equipement;
use App\Models\OpenTicket;
use Illuminate\Http\Request;
use App\Models\TicketCategory;

class TicketController extends Controller
{
    public function index()
    {

        // TODO add closed tickets too
        $openTickets = OpenTicket::with('user', 'equipement', 'ticketCategory')->latest()->get();
        $categories = TicketCategory::select('id', 'category')->get();
        $equipements = Equipement::select('id', 'name')->get();
        
        return view('tickets.index')->with([
            'openTickets' => $openTickets,
            'categories' => $categories,
            'equipements' => $equipements,
        ]);
    }
    public function myTickets(User $user)
    {
        $tickets = OpenTicket::where('user_id', $user->id)->latest()->get();
        return view('tickets.my_tickets')->with([
            'tickets' => $tickets
        ]);
    }
}
