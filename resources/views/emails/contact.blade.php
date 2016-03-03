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