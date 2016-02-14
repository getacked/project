<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Email Confirmation</title>
</head>

<body>
	<h1>Welcome to Eventure</h1>

	<p>Welcome {{ $user->first_name }} {{ $user->last_name }}, </p>
	
	<p>
		Please confirm your email by clicking the following link:<br/>
		http://www.eventure.app/register/confirm/{{ $user->token }}  
	</p>
</body>


</html>