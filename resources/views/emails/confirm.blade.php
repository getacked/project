@extends('emails.email')

@section('title')
Please confirm your new email.
@stop

@section('content')
<tr>
	<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>Hi {{ $user->username }}</td>
			</tr>
				
			<tr>
				<td style="padding: 20px 0 30px 0;">
				To confirm your change of email address please <a href="{{ url('register/confirm') . '/' . $user->token }}"><i>click here</i></a>.
				</td>
			</tr>

			<tr>
				<td> Best Regards, <br/> The Eventure Team </td>
			</tr>
		</table>
	</td>
</tr>
@stop
