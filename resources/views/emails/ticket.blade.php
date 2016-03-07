<table border="1" width="100%" bgcolor="white">
	<tr>
		<td colspan="4" align="center"><b>Eventure</b></td>
	</tr>

	<tr width="100%">
		<td colspan="1" width="25%" align="center" ><b>Event:</b></td>
		<td colspan="3" width="75%" align="center">Bassline Presents Tchami at Fermoy{{ $event->name }}</td>
	</tr>
	
	<tr>
		<td width="25%" align="center"><b>Time/Date:</b></td>
		<td width="25%" align="center">22:00 , 09/03/16{{ $event->event_time }}</td>
		
		<td width="25%" align="center"><b>Location:</b></td>
		<td width="25%" align="center">Fermoy SG1<!-- $event->place_name --></td>
	</tr>
	
	<tr>
		<td colspan="1" align="center"><b>Order Info:</b></td>
		<td colspan="3" align="center">Order no:243534<!-- Ticket->id -->. Ordered by {{ $user->first_name }} , {{ $user->last_name }} on {{ $user->attending()->has('id', '=', $event->id)->pivot->created_at }}</td>	
	</tr>	
	
	<tr>
		<td colspan="1" align="center"><b>Ticket price:</b></td>
		<td colspan="3" align="center">{{ $event->ticket_price }}</td>	
	</tr>

	<tr>
		<td colspan="1" align="center"><b>Ticket price:</b></td>
		<td colspan="3" align="center">{{ $event->ticket_price }}</td>	
	</tr>
	
	<tr>
		<td colspan="4" align="center" style="padding: 5px 5px 5px 5px;">
			<img src="http://ffffionn.xyz/images/qrcodes/{{ $event->id }}.png" alt="Ensure your browser has images enabled to view QR code" width="100" height="100" style="display: block;" />
		</td>
	</tr>
</table>