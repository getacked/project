<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth, Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Organiser;
use App\Http\Requests\OrganiserRequest;

class OrganisersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisers = Organiser::all();

        return view('organisers.index', compact('organisers') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organisers.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganiserRequest $request)
    {
        Organiser::create( $request->toArray() );

        Auth::attempt( $request->only('email', 'password') );

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organiser $organiser, $id)
    {
        $organiser = Organiser::find($id);
        return view('organisers.show', compact('organiser') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display log in form.
     * @return [type] [description]
     */
    public function login()
    {
      return view('organiser.login');
    }

    public function handleLogin(Request $request)
    {

    }

    public function logout()
    {
      Auth::logout();

      return Redirect::route('/');
    }

}
