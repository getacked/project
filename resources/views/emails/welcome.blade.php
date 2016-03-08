@extends('emails.email')

@section('title')
Please Confirm your email
@stop

@section('content')
<tr>
	<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>Hi {{ $user->username }},</td>
				</tr>
					
				<tr>
					<td style="padding: 20px 0 30px 0;">
					   Thank you for taking the time to sign up to Eventure! Before we can welcome you as part of the Eventure family we just need you to confirm your email address by <a href="{{ url('register/confirm') . '/' . $user->token }}"><i>clicking here</i></a>.
					</td>
				</tr>

				<tr>
					<td> Best Regards, <br/> The Eventure Team </td>
				</tr>
		</table>
	</td>
</tr>
@stop
