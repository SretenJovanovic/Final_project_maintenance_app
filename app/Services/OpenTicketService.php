<?php

namespace App\Services;

use App\Models\Equipement;
use App\Models\OpenTicket;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OpenTicketStoreRequest;

class OpenTicketService
{

    public function storeTicket(OpenTicketStoreRequest $request, OpenTicket $openTicket)
    {
        DB::transaction(function () use ($request, $openTicket) {


            $openTicket->user_id = $request->input('user');
            $openTicket->equipement_id = $request->input('equipement');
            $openTicket->ticket_category_id = $request->input('category');
            $openTicket->description = $request->input('description');

            $equipement = Equipement::findOrFail($request->input('equipement'));
            $equipement->status = 0;
            $equipement->save();

            $openTicket->save();
        });
    }
}
