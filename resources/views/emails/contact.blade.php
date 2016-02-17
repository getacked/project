@extends('emails.email')

@section('title')
Message from site contact form.
@endsection

@section('content')
<h1>Message from site contact form.</h1>

<p>
	Name: {{ $request->input('name') }}
	<br />
	Email: {{ $request->input('email') }}
</p>

<p>
	Message:
	<br />
	{{ $request->input('message') }}
</p>
@endsection