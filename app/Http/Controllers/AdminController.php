<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketCategory;

class AdminController extends Controller
{


    public function index()
    {

        return view('admin.index')->with([
            'user' => auth()->user(),
            'ticketCategories' => TicketCategory::all()
        ]);
    }
}
