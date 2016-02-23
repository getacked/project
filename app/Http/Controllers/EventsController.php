<?php

namespace App\Http\Controllers;

use Auth, Redirect, View, Storage, Input;
use App\Event;
// use Input;
use App\Photo;
use Carbon\Carbon;
use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventEditRequest;
use App\Http\Controllers\Controller;


class EventsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth',
      ['except' => [
        'index',
        'show'
      ]]);
    $this->middleware('user.type:normal', 
                ['only' => ['attend']]);
    $this->middleware('user.type:host',
      ['except' => [
        'show',
        'index',
        'attend'
      ]]);
  }

  public function create(){
    //create a list of all most commonly used tags
    $tags = Tag::lists('name');
    return view('events.create', compact('tags'));  
  }

  public function store(EventRequest $request)
  {
    $user = Auth::user();
//extract attributes from input
    $attributes = $request->only('name', 'type', 'description', 'ticket_cap', 'gmaps_id');
    $attributes['ticket_left'] = $request['ticket_cap'];
    $attributes['host_id'] = $user->id;

// parse date and time to create a carbon instance
    $dateTime = $request['event_date'] . " " . $request['event_time'];
    $attributes['event_time'] = Carbon::createFromFormat('d F, Y H:i', $dateTime);

// create an Event and associate the user as host
    $event = Event::create($attributes)->host()->associate($user);

// trim custom tags for whitespace and make array
    $trimmedTags = preg_replace('/\s+/', '', $request['customTags']);
    $tags = explode(',', $trimmedTags);

    if($request['tags'])
    {
      foreach($request['tags'] as $tag)
      {
        $event->tags()->attach(Tag::find($tag));
      }  
    }

    //
    if($tags)
    {
      foreach($tags as $tag)
      { 
        $event->tags()->attach(Tag::firstOrCreate(array('name' => $tag)));
      }  
    }

    if( $request->file('image') ){
      $imageFile = $request->file('image');

    //make timestamp and append event name for filename
      $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
      $filename = $timestamp . '-' . $event->name;
    //remove 'image/' from MIME type
      $mime = "." . substr($imageFile->getMimeType(), 6);
    //move file to /public/images/
      $filename = $timestamp . '-' . $event->name;
    
      $photoData = array('fileName' => $filename, 'mime' => $mime);
      $photo = Photo::create( $photoData );
    //move uploaded file to public dir
      $imageFile->move( public_path().'/images/uploads/', $filename . $mime );
  
    //associate the image with the user
      $event->photo_id = $photo->id;
      $event->photo()->associate( $photo );
      $event->save();
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

  public function attend(Event $event)
  {
    if( !$event->attendees->contains(Auth::user()) ){
      $event->attendees()->attach( Auth::user() );
    }

    $event->ticket_left--;
    $event->save();
    return Redirect::route('events.show', compact('event') );

  }

}