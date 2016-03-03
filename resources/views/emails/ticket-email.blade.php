@extends('emails.email')

@section('title')
Order Confirmation.
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
				This is your order confirmation for: Bassline presents Tchami at Fermoy<!-- $event->name -->
				<br/>
				Organised by:<!-- $event->host()->username -->
				<br/><br/>
				Your tickets are below and this email may be printed and brought with you on the day of the event. Alternativley you can dispaly this email on a mobile device as your ticket/s. Please note that if you did not purchase these tickets you can contact use by 
				<a href="{{ url(route('contact')) }}"><i>clicking here</i></a>.
				</td>
			</tr>
			
			<tr>
				<td> Best Regards, <br/> The Eventure Team </td>
			</tr>
		</table>
	</td>
</tr>

@for($i=0; $i<3; $i++)
	@include('emails.ticket')
@endfor

@stop