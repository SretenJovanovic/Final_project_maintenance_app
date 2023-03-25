<?php

namespace App\Http\Controllers;

use App\Models\AssignedTicket;
use App\Models\OpenTicket;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{


    public function index()
    {
        $assignedTickets = AssignedTicket::where('user_id',auth()->user()->id)->with('openTicket.equipement','openTicket.user')->latest()->get();
        
        return view('technician.index')->with([
            'tickets'=>$assignedTickets
        ]);
    }
}
