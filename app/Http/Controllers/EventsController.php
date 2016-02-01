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
    $request['user_id'] = Auth::id();

    $date = $request['event_date'];
    $time = $request['event_time'];
    $dateTime = $date . " " . $time;
    $carbon = Carbon::createFromFormat('d F, Y H:i', $dateTime);
    $request['event_time'] = $carbon;

    Event::create($request->toArray())->user()->associate(Auth::id());
    
    return redirect()->action('EventsController@index');
  }

  public function index()
  {
     $events = Event::all();

     return view('events.all', compact('events') );
  }

  public function show(Event $event, $id)
  {
    $event = Event::findOrFail($id)->first();
    return view('events.show', compact('event'));
  }

  public function edit(Event $event, $id)
  {
    $event = Event::findOrFail($id)->first();
    return view('events.edit', compact('event'));
  }

  /**
   * Update the event's details
   * 
   * @param  EventEditRequest $request The User's Request
   * @param  [type]           $id      id of the event
   */
  public function update(EventEditRequest $request, $id){

    $event = Event::findOrFail($id)->first();

    $event->event_name = $request->event_name;
    $event->tickets = $request->tickets;
    $event->type = $request->type;
    $event->event_time = Carbon::parse($request->event_time);
    $event->save();

    return view('events.show', compact('event'));
  }
  
}