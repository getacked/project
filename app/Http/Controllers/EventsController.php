<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventEditRequest;
use Auth, Redirect;
use Carbon\Carbon;

class EventsController extends Controller
{

  public function create(){
    return view('forms.events-create');  
  }

  public function store(EventRequest $request)
  {
    // set the owner of the event to the logged in user
    $request['user_id'] = Auth::id();

    // parse date and time to create a carbon instance
    $dateTime = $request['event_date'] . " " . $request['event_time'];
    $carbon = Carbon::createFromFormat('d F, Y H:i', $dateTime);
    $request['event_time'] = $carbon;

    // create an Event and associate the user with it
    Event::create($request->toArray())->user()->associate(Auth::id());
    
    // show all events
    return redirect()->action('EventsController@index');
  }

  public function index()
  {
     $events = Event::orderBy('event_time')->get();

     return view('events.all', compact('events') );
  }

  public function show(Event $event, $id)
  { 
    $event = Event::findOrFail($id);
    return view('events.show', compact('event'));
  }

  public function edit(Event $event, $id)
  {
    $event = Event::findOrFail($id);
    return view('events.edit', compact('event'));
  }

  /**
   * Update the event's details
   * 
   * @param  EventEditRequest $request The User's Request
   * @param  [type]           $id      id of the event
   */
  public function update(EventEditRequest $request, $id){

    $event = Event::findOrFail($id);

    $event->event_name = $request->event_name;
    $event->tickets = $request->tickets;
    $event->type = $request->type;

    // Parse date and time into a carbon instance 
    $dateTime = $request['event_date'] . " " . $request['event_time'];
    $carbon = Carbon::createFromFormat('d F, Y H:i', $dateTime);
    $request['event_time'] = $carbon;

    $event->event_time = $carbon;

    // save variable changes
    $event->save();

    // show updated event
    return view('events.show', compact('event'));
  }
  
}