@extends('layouts.app')
@section('content')
    <h4>Set meeting</h4>


    <div class="row m-0">

        <div class="col-md-4">
            <form action="{{ route('manager.set.meeting') }}" method="POST">
                @csrf
                <label for="meeting_title">Meeting title</label>
                <br>
                <input type="text" name="meeting_title" id="meeting_title">
                <br>
                <label for="meeting_description">Meeting details</label>
                <br>
                <textarea name="meeting_description" id="meeting_description" cols="30" rows="10"></textarea>
                <br>
                <label for="meeting_date">Choose a time for meeting</label>
                <br>
                <input type="date" name="meeting_date" id="date">
                <input type="time" name="meeting_time" id="time">
                <br>

                <label for="meeting_duration">Meeting duration</label>
                <br>
                <select name="meeting_duration" id="meeting_duration">
                    <option value="1">1 hour</option>
                    <option value="2">2 hours</option>
                    <option value="3">3 hours</option>
                </select>
                <button type="submit">Set a meeting</button>
            </form>
        </div>


        <x-meeting-table :events="$events"/>
        
    </div>



    </div>
@endsection
