<table border="1" width="100%" bgcolor="white">
	<tr>
		<td colspan="4" align="center"><b>Eventure</b></td>
	</tr>

	<tr width="100%">
		<td colspan="1" width="25%" align="center" ><b>Event:</b></td>
		<td colspan="3" width="75%" align="center">{{ $event->name }}</td>
	</tr>
	
	<tr>
		<td width="25%" align="center"><b>Time/Date:</b></td>
		<td width="25%" align="center">{{ $event->event_time->toDayDateTimeString() }}</td>
		
		<td width="25%" align="center"><b>Location:</b></td>
		<td width="25%" align="center">Fermoy SG1<!-- $event->place_name --></td>
	</tr>
	
	<tr>
		<td colspan="1" align="center"><b>Order Info:</b></td>
		<td colspan="3" align="center">Order no: {{ DB::table('attending')->where('event_id' , $event->id)->where('user_id', Auth::user()->id)->first()->id }}. 
			Ordered by {{ $user->first_name }} , {{ $user->last_name }} on {{ DB::table('attending')->where('event_id' , $event->id)->where('user_id', Auth::user()->id)->first()->created_at }}</td>	
	</tr>	
	
	<tr>
		<td colspan="1" align="center"><b>Ticket price:</b></td>
		<td colspan="3" align="center">{{ $event->ticket_price }}</td>	
	</tr>

	<tr>`
		<td colspan="1" align="center"><b>Ticket Number:</b></td>
		<td colspan="3" align="center">{{ $i }} of {{ $num_tickets }}</td>	
	</tr>
	
	<tr>
		<td colspan="4" align="center" style="padding: 5px 5px 5px 5px;">
			<img src="http://ffffionn.xyz/images/qrcodes/{{ $event->id }}.png" alt="Ensure your browser has images enabled to view QR code" width="100" height="100" style="display: block;" />
		</td>
	</tr>
</table>