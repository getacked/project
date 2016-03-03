@extends('emails.email')

@section('title')
Thank you for your message.
@stop

@section('content')
<tr>
	<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>Hi {{ $request->input('name') }},</td>
			</tr>

			<td style="padding: 20px 0 30px 0;">
				This is an email to confirm that your message:<br/>
				"<i>{{ $request->input('message') }}</i>"<br>
				was sent to a member of our team and you that can expect to hear from us shortley.
			</td>

			<tr>
				<td>Best Regards, <br/>The Eventure Team</td>
			</tr>
		</table>
</tr>
@stop