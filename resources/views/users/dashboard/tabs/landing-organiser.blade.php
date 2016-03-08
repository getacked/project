<div id="dashboard" class="col s12">
	<div class="fixed-action-btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click here to Edit profile data" style="top: 300px; right: 5%;">
			<a class="btn-floating btn-large red" href="{{ route('edit-account') }}">
				<i class="large material-icons">mode_edit</i>
			</a>
	</div>

	<div id="imageContainerorg">
		<div class="valign-wrapper">
			<h2 class="valign center-block white-text">Welcome, {{ $user->first_name }}</h2>
		</div>

		<h5 class="center-align white-text">Cork</h5>
		<div class="row valign-wrapper">
			<div class="col s4"><p class="right-align white-text">{{ $user->email }}</p></div>
			<div class="col s4 divider"></div>
			<div class="col s4"><p class="left-align white-text">{{ $user->tel_no }}</p></div>
		</div>
	</div>


	<section >
		<h4 class="center-align">Create an event</h4>

		<div class="center">
			<a href="{{ route('events.create') }}">
				<i class="material-icons large">add_to_queue</i>
			</a>
		</div>

		<h4 class="center-align">Here are your upcoming events:</h4>

		<div class="row">
			@forelse($user->events()->upcoming() as $event)
				@include('partials.event-dashboard')
			@empty
				<p class="center-align">
					You have not yet organised an event. <br>
					<a href="{{ route('events.create') }}">Start now?</a>
				</p>
			@endforelse
		</div>
	</section>

</div>


    
    <div class="hidden" style="height=0;width=0;display:none" id="map">

    </div>
