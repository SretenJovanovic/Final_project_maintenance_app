@extends('layouts.app')
@section('content')
    <h4>Set meeting</h4>


    <div class="row m-0">

        <div class="col-md-3 border p-3">
            <form action="{{ route('manager.set.meeting') }}" method="POST">
                @csrf
                <label class="form-label" for="meeting_title">Meeting title</label>
                <input  class="form-control mb-2" type="text" name="meeting_title" id="meeting_title">
                <label class="form-label" for="meeting_description">Meeting details</label>
                <textarea class="form-control" name="meeting_description" id="meeting_description" rows=5></textarea>
                <label class="form-label" for="meeting_date">Choose a time for meeting</label>
                <input class="form-control mb-2" type="date" name="meeting_date" id="date">
                <input class="form-control mb-2" type="time" name="meeting_time" id="time">

                <label class="form-label" for="meeting_duration">Meeting duration</label>
                <select class="form-control mb-3" name="meeting_duration" id="meeting_duration">
                    <option value="1">1 hour</option>
                    <option value="2">2 hours</option>
                    <option value="3">3 hours</option>
                </select>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success" type="submit">SET A MEETING</button>
                  </div>
            </form>
        </div>


        <x-meeting-table :events="$events"/>
        
    </div>



    </div>
@endsection
