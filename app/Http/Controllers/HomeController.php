<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Equipement;
use App\Models\OpenTicket;
use Illuminate\Http\Request;
use App\Models\TicketCategory;

class HomeController extends Controller
{


    public function index()
    {

        $openTickets = OpenTicket::with('user','equipement','ticketCategory')->get();
        
        return view('home')->with([
            'openTickets' => $openTickets
        ]);
    }
}
