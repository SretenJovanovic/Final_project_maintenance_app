<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class CalendarController extends Controller
{
    public function set_meeting(Request $request)
    {

        $date_and_time = $request->input('meeting_date') . ' ' . $request->input('meeting_time');
        $date_and_time = Carbon::createFromFormat('Y-m-d H:i', $date_and_time);

        $event = new Event();

        $event->summary = $request->input('meeting_title');
        $event->description = $request->input('meeting_description');
        $event->startDateTime  = $date_and_time;
        $event->endDateTime = $date_and_time->addHour();
        $event->save();

        return redirect()->route('manager.index');
    }

    public function meetings()
    {
        $events = Event::get();

        return view('technician.meeting')->with([
            'events' => $events
        ]);
    }
}
