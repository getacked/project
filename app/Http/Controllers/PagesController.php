<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Event;
use App\User;

class PagesController extends Controller
{
  public function homepage(){
    $events = Event::orderBy('event_time')->get();
    return View::make('home', compact('events'));
  }

  public function contact(){
    return View::make('pages.contact');
  }
  
  public function faq(){
    return View::make('pages.faq');
  }

  
}
