<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class ManagerController extends Controller
{
    public function index()
    {
        $events = Event::get();
        
        return view('manager.index')->with([
            'user' => auth()->user(),
            'events' => $events
        ]);
    }
    
}
