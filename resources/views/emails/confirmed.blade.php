@extends('emails.email')

@section('title')
Thank you for confimrng your email.
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
			   Thank you for confirming your email address. You can now access Eventure! Why not jump straight into our world of events by <a href="{{ url('login') }}"><i>logging in</i></a>.
				</td>
			</tr>
			
			<tr>
				<td>Best Regards, <br/>The Eventure Team</td>
			</tr>
		</table>
	</td>
</tr>
@stop
					 