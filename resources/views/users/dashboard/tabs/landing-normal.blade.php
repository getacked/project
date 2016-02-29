<div id="dashboard" class="col s12">
	<div class="fixed-action-btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click here to Edit profile data" style="top: 300px; right: 5%;">
			<a class="btn-floating btn-large red" href="{{ route('edit-account') }}">
				<i class="large material-icons">mode_edit</i>
			</a>
	</div>

	<div id="imageContaineruser">
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
	<h4 class="center-align">We Know you Like</h4>
	<div class="row card-panel #90caf9 blue lighten-3" id="tags">
	  @forelse($tags as $tag)
		<div class="chip center-align">
			<?php 
			echo ucfirst($tag->name);
			?>
			<i class="material-icons" data-button="remove" id="{{ $tag->name }}">close</i>
		</div>
		@empty
		@endforelse				
	</div>
	
	<div class="row col s10">
		{{ Form::open(array( 'route' => 'addTag', 'method' => 'post', 'id' => 'addTag')) }}
			<p class="col s2">Add an interest:</p>
			<div class="input-field col s8">
				 <input placeholder="Type interest here" id="tag" name="tag" type="text" class="validate">
			</div>
			<button class="btn waves-effect waves-light col s4 m2" type="submit">Add
				 <i class="material-icons right">add</i>
		    </button>
		</form>
	</div>
</section>

	<!-- Suggested Events -->
	<div class="divider"></div>
	<section>
		<h4 class="center-align col s12">So what about these events?</h4>
			<div class="row">
				@foreach($suggestedEvents as $event)
					@include('partials.event-dashboard', $event)
				@endforeach
			</div>
	</section>
</div>