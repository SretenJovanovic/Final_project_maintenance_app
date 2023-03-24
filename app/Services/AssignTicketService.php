<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\AssignedTicket;
use App\Models\OpenTicket;
use Illuminate\Support\Facades\DB;

class AssignTicketService
{

    public function assignTicket(Request $request, AssignedTicket $assignedTicket)
    {
        DB::transaction(function () use ($request, $assignedTicket) {


            $assignedTicket->open_ticket_id = $request->input('openTicketId');
            $assignedTicket->user_id = $request->input('technician');

            $assignedTicket->save();

            $openTicket = OpenTicket::findOrFail($request->input('openTicketId'));
            $openTicket->status = 0;
            $openTicket->save();
        });
    }
}
