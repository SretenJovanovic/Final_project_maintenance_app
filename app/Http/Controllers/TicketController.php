<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OpenTicket;
use App\Models\ClosedTicket;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use Illuminate\Validation\Rule;

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

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'string', Rule::unique('ticket_categories', 'category')],
        ]);
        if ($validated) {
            $ticketCategory = new TicketCategory();
            $ticketCategory->category = $request->category;
            $ticketCategory->save();
            
            return redirect()->route('admin.index')->withSuccess('Category saved.');
        }
        return redirect()->back();
    }
    public function destroyCategory(TicketCategory $ticketCategory)
    {
        
       $ticketCategory->delete();
        return redirect()->back()->withSuccess('Category deleted.');;
    }
}
