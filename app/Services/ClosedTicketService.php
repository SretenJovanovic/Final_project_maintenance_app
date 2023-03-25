<?php

namespace App\Services;

use App\Models\AssignedTicket;
use Illuminate\Http\Request;
use App\Models\ClosedTicket;
use App\Models\OpenTicket;
use Illuminate\Support\Facades\DB;

class ClosedTicketService
{

    public function closeTicket(Request $request, ClosedTicket $closedTicket)
    {
        DB::transaction(function () use ($request, $closedTicket) {


            $closedTicket->open_ticket_id = $request->input('open_ticket_id');
            $closedTicket->user_id = $request->input('user_id');
            $closedTicket->solution_description = $request->input('description');
            $closedTicket->save();

            $assignedTicket = AssignedTicket::findOrFail($request->input('assigned_ticket_id'));
            $assignedTicket->delete();
        });
    }
}
