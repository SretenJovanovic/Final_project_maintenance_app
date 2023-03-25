<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Equipement;
use App\Models\OpenTicket;
use Illuminate\Http\Request;
use App\Models\AssignedTicket;
use App\Models\TicketCategory;
use Illuminate\Validation\Rule;
use App\Services\OpenTicketService;
use App\Services\AssignTicketService;
use App\Http\Requests\OpenTicketStoreRequest;

class OpenTicketController extends Controller
{
    public function index()
    {
        $openTickets = OpenTicket::where('status', 1)->with('user', 'equipement', 'ticketCategory', 'assignedTicket')
            ->orderBy('status', 'desc')
            ->latest()
            ->get();

        $categories = TicketCategory::select('id', 'category')->get();
        $equipements = Equipement::select('id', 'name')->get();

        // Get all technicians
        $technicians = Role::with('user')->findOrFail(4)->user;

        return view('tickets.open.index')->with([
            'openTickets' => $openTickets,
            'categories' => $categories,
            'equipements' => $equipements,
            'technicians' => $technicians
        ]);
    }


    public function create()
    {
        $categories = TicketCategory::select('id', 'category')->get();
        $equipements = Equipement::select('id', 'name')->get();

        return view('tickets.open.create')->with([
            'categories' => $categories,
            'equipements' => $equipements,
        ]);
    }
    public function store(OpenTicketStoreRequest $request)
    {
        $openTicket = new OpenTicket();
        $openTicketService = new OpenTicketService();
        $openTicketService->storeTicket($request, $openTicket);

        return redirect()->route('ticket.my.show', auth()->user()->username);
    }

    public function assign(Request $request)
    {
        $validated = $request->validate([
            'openTicketId' => ['required', 'integer', 'max:255', Rule::exists('open_tickets', 'id')],
            'technician' => ['required', 'integer', 'max:255', Rule::exists('users', 'id')],
        ]);

        if ($validated) {
            $assignedTicket = new AssignedTicket();

            $assignedTicketService = new AssignTicketService();
            $assignedTicketService->assignTicket($request, $assignedTicket);

            return redirect()->route('open.ticket.index');
        }
        return redirect()->back();;
    }
}
