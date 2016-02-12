<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventEditRequest;
use Auth, Redirect, View;
use Carbon\Carbon;
use App\Tag;

class EventsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth', ['except' => ['show', 'index'] ]);
  }

  public function create(){
    $tags = Tag::lists('name');
    return view('forms.events-create', compact('tags'));  
  }

  public function store(EventRequest $request)
  {
    $attributes = $request->only('name', 'type', 'description', 'ticket_cap');
    $attributes['ticket_left'] = $request['ticket_cap'];   
    // parse date and time to create a carbon instance
    $dateTime = $request['event_date'] . " " . $request['event_time'];
    $attributes['event_time'] = Carbon::createFromFormat('d F, Y H:i', $dateTime);

    // set the owner of the event to the logged in user
    $attributes['host_id'] = Auth::id();

    // create an Event and associate the user as host
    $event = Event::create($attributes)->host()->associate(Auth::user());
    

    // trim custom tags for whitespace and make array
    $trimmedTags = preg_replace('/\s+/', '', $request['customTags']);
    $tags = explode(',', $trimmedTags);

    if($request['tags'])
    {
      foreach($request['tags'] as $tag)
      {
        $event->tags()->attach($tag);
      }  
    }

    if($tags)
    {
      foreach($tags as $tag)
      {
        $event->tags()->attach(Tag::firstOrCreate(array('name' => $tag)));
      }  
    }
    
    // show all events
    return redirect()->action('EventsController@index');
  }


  public function index()
  {
     $events = Event::orderBy('event_time')->upcoming()->get();

     return view('events.all', compact('events') );
  }

  public function show(Event $event, $id)
  { 
    $event = Event::findOrFail($id);
    return view('events.show', compact('event'));
  }

  public function edit(Event $event, $id)
  {
    $event = Event::find($id);
    return view('events.edit', compact('event'));
  }

  /**
   * Update the event's details
   * 
   * @param  EventEditRequest $request The User's Request
   * @param  [type]           $id      id of the event
   */
  public function update(EventEditRequest $request, $id){

    // Parse date and time into a carbon instance 
    $dateTime = $request['event_date'] . " " . $request['event_time'];
    $carbon = Carbon::createFromFormat('d F, Y H:i', $dateTime);
    $request['event_time'] = $carbon;

    // Update the fields shown in the form 
    Event::where('id', $id)->update($request->only('name', 'tickets', 'type', 'event_time'));
    // Show updated event
    $event = Event::find($id);
    return view('events.show', compact('event'));
  }
  
  public function addTag(Event $event)
  {
    return "wowo";
  }

  public function follow(Event $event)
  {
    // dd($event);
    $event->attendees()->attach( Auth::user() );
    return view('events.show', compact('event') );
    // return View::make('events.show', $event);
  }

}