<!-- Upcoming tab -->
<div id="upcoming" class="col s12">
	<h3 class="center-align col s12">Here are our upcoming events</h3>
	<div>
		<!--events will be pulled in here from the database base on upcoming events,perhaps based on location?-->
		<section>
			<div class="row">
				<!-- Upcoming Events -->
				@forelse($upcomingEvents as $event)
					@include('partials.event-dashboard')
				@empty
					<p class="center-align">
						There's a shortage in events at the moment. 
					</p>
				@endforelse

			</div>
	    </section>
	</div>
	</div>