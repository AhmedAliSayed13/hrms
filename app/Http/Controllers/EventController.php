<?php

  namespace App\Http\Controllers;

  use App\Models\Event;
  use App\Models\EventAttendee;
  use App\Models\Meeting;
  use App\Models\MeetingAttendee;
  use App\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Mail;
  use App\Mail\MeetingInvitationMail;

  class EventController extends Controller {

    public function index()
    {
      $users = User::get(['id', 'name']);

        $events = $this->convertToArray(Event::orderBy('date','desc')->take(9)->get());

      return view('hrms.events.index', compact( 'users', 'events'));
    }

    public function createEvent(Request $request)
    {
      $name = $request->name;
      $attendees = $request->attendees;
      $date = date_format(date_create($request->date), 'Y-m-d H:i:s');
      $message = $request->message;
      $event = new Event();
      $event->name = $name;
      $event->date = $date;
      $event->message = $message;
      $event->save();

      foreach($attendees as $attendee)
      {
        $eventAttendee = new EventAttendee();
        $eventAttendee->event_id = $event->id;
        $eventAttendee->attendee_id = $attendee;
        $eventAttendee->save();
      }
      //return json_encode('success');
      \Session::flash('flash_message', 'event successfully saved!');
    }

    public function meeting()
    {
        

        $users = User::get(['id', 'name']);
        $meetings = $this->convertToArray(Meeting::orderBy('date','desc')->take(9)->get());

        return view('hrms.meeting.meeting_index', compact( 'users', 'meetings'));
    }

    public function createMeeting(Request $request)
    {

        $name = $request->name;
        $attendees = $request->attendees;
        $date = date_format(date_create($request->date), 'Y-m-d H:i:s');
        $message = $request->message;

        $meeting = new Meeting();
        $meeting->name = $name;
        $meeting->date = $date;
        $meeting->message = $message;
        $meeting->save();


        foreach($attendees as $attendee)
        {
            $meetingAttendee = new MeetingAttendee();
            $meetingAttendee->meeting_id = $meeting->id;
            $meetingAttendee->attendee_id = $attendee;
            $meetingAttendee->save();

            
        }
        $attendees = $meeting->attendees->pluck('email')->toArray();
        Mail::to($attendees)->send(new MeetingInvitationMail($meeting));

        return json_encode('success');
    }
      /**
       * @return string
       */
      public function convertToArray($values)
      {
          $result = [];
          foreach($values as $key => $value)
          {
              $result[$key] = $value;
          }
          return $result;
      }

  }
