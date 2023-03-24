<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\OpenTicketStoreRequest;
use App\Models\OpenTicket;

class OpenTicketService
{

    public function storeTicket(OpenTicketStoreRequest $request, OpenTicket $openTicket)
    {
        DB::transaction(function () use ($request, $openTicket) {


            $openTicket->user_id = $request->input('user');
            $openTicket->equipement_id = $request->input('equipement');
            $openTicket->ticket_category_id = $request->input('category');
            $openTicket->description = $request->input('description');

            $openTicket->save();
        });
    }
}
