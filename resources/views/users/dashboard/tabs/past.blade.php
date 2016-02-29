  <!-- Past tab -->
  <div id="past" class="col s12">
		<h3 class="center-align col s12">Past events you have <?php echo $user->hastype('normal') ? 'attended' : 'organised'; ?></h3>
		<div>
			<section>
				<div class="row">
					@forelse($pastEvents as $event)
						@include('partials.event-dashboard')
					@empty
						<?php 
							if($user->hasType('normal')) {
								echo '<p class="center-align">
										You have not attended any events yet, what are you waiting for?
									  </p>';
							}
							else {
								echo '<p class="center-align">
										You have no past events.
									  </p>';
							}
						?>
					@endforelse

				</div>
		    </section>
		</div>
  </div>