@extends('base')

@section('content')
<div class="row">
	<div class="col s12">
		<ul class="tabs">
			<li class="tab col s3"><a href="#dashboard" class="active">Dashboard</a></li>
			<li class="tab col s3"><a href="#upcoming">Upcoming</a></li>
			<li class="tab col s3"><a href="#past">Past Events</a></li>
			<li class="tab col s3"><a href="#searchTab">Your Subscriptions</a></li>
		</ul>
	</div>
 </div>
 <div class="container">

  <?php
    // User
    $user = Auth::user();

    // Suggested events
    $suggestedEvents = App\Event::all();
    // Upcoming events
    $upcomingEvents = App\Event::upcoming()->get();
    // Past events
    $pastEvents = App\Event::past($user)->get();
  ?>

<div id="dashboard" class="col s12">
	<div class="fixed-action-btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click here to Edit profile data" style="top: 205px; right: 5%;">
		<a class="btn-floating btn-large red" href="{{ route('user.edit', $user->id) }}">
			<i class="large material-icons">mode_edit</i>
		</a>
	</div>
	
	<div id="imageContaineruser">
		<div class="valign-wrapper">
			<!--data will have to be pulled here to supply a name for the h1 and fill in profile data below-->
			<h2 class="valign center-block white-text">Welcome, {{ $user->first_name }}</h2>
		</div>

		<h5 class="center-align white-text">Cork</h5>
		<div class="row valign-wrapper">
			<div class="col s4"><p class="right-align white-text">{{ $user->email }}</p></div>
			<div class="col s4 divider"></div>
			<div class="col s4"><p class="left-align white-text">{{ $user->tel_no }}</p></div>
		</div>
	</div>
	
	<!-- Tags -->
	<section>
		<h4 class="center-align">We Know you Like</h4>
		<div class="row valign-wrapper">
			<div class="card-panel #90caf9 blue lighten-3 col s10">

				<div class="col s2">
					<p>Pop</p>
				</div>
				<div class="col s2">
					<p>House</p>
				</div>
				<div class="col s2">
					<p>Sport</p>
				</div>
				
			</div>

			<div class="col s2 right-align valign">
				<a class="waves-effect waves-light btn" href="editpage.html" ><i class="material-icons left">create</i>Edit Interests</a>
			</div>
		</div>
	</section>

	<!-- Suggested tab -->
	<div class="divider"></div>
	<section>
		<h4 class="center-align col s12">So what about these events?</h4>
			<div class="row">
				<!-- Suggested Events -->
				@foreach($suggestedEvents as $event)
					@include('partials.event-dashboard', $event)
				@endforeach
			</div>
	</section>
</div>
  
	<!-- Upcoming tab -->
	<div id="upcoming" class="col s12">
		<h3 class="center-align col s12">Here are our upcoming events</h3>
		<div>
			<!--events will be pulled in here from the database base on upcoming events,perhaps based on location?-->
			<section>
				<div class="row">
					<!-- Upcoming Events -->
					@foreach($upcomingEvents as $event)
						@include('partials.event-dashboard')
					@endforeach

				</div>
		    </section>
		</div>
  	</div>

    <!-- Past tab -->
    <div id="past" class="col s12">
  		<h3 class="center-align col s12">Past events you have attended</h3>
  		<div>
  			<section>
  				<div class="row">
  					@if( count($pastEvents) > 0)
  						<!-- Past Events -->
  						@foreach($pastEvents as $event)
  							@include('partials.event-dashboard')
  						@endforeach
  					@else
  						<p class="center-align">
  							you have not attended any events yet, what are you waiting for?
  						</p>
  					@endif

  				</div>
  		    </section>
  		</div>
    </div>

    


  
</div>
@stop