@extends('emails.email')

@section('title')
Welcome to eventure - Please confirm your email.
@endsection

@section('content')
<h1>Welcome to Eventure</h1>

<p>Welcome {{ $user->first_name }} {{ $user->last_name }}, </p>

<p>
	Please confirm your email by clicking the following link:<br/>
	http://www.eventure.app/register/confirm/{{ $user->token }}  
</p>
@endsection
