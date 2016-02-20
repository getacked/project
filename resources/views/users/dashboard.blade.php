@extends('base')

@section('content')
<div class="row">
	<div class="col s12">
		<ul class="tabs">
			<li class="tab col s3"><a href="#dashboard" class="active">Dashboard</a></li>
			<li class="tab col s3"><a href="#upcoming">Upcoming</a></li>
			<li class="tab col s3"><a href="#past">Past Events</a></li>
			<li class="tab col s3"><a href="#searchTab">Search Events</a></li>
		</ul>
	</div>
 </div>
 <div class="container">

  <div id="dashboard" class="col s12">
  		<div class="fixed-action-btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click here to Edit profile data" style="top: 205px; right: 5%;">
		    <a class="btn-floating btn-large red" href="fvfv">
		      <i class="large material-icons">mode_edit</i>
		    </a>
		</div>
	  	<div id="imageContaineruser">
	  		<div class="valign-wrapper">
	  		 <!--data will have to be pulled here to supply a name for the h1 and fill in profile data below-->
					 <h2 class="valign center-block black-text">Welcome Jack!</h2>
				</div>
				 <h5 class="center-align white-text">Cork</h5>
				 <div class="row valign-wrapper">
				 	<div class="col s4"><p class="right-align white-text">jacknev13@gmail.com</p></div>
				 	<div class="col s4 divider"></div>
				 	<div class="col s4"><p class="left-align white-text">0863341643</p></div>
				 </div>
		</div>
		<section >
			<h4 class="center-align">We Know you Like</h4>
			<div class="row valign-wrapper">
				<div class="card-panel #90caf9 blue lighten-3 col s10">
				  <!--these interests must be pulled from the database-->
					<div class="col s2">
						<p>Rock</p>
					</div>
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
		<div class="divider"></div>

			
		<!--events will be pulled in here from the database base on the users interests-->
		<section>
			<h4 class="center-align col s12">So what about these events?</h4>
			<div class="row">
			  <div class="col s6 m4 l3">
				<div class="card">
				  <div class="card-image waves-effect waves-block waves-light">
	                <img class="activator" src="http://lorempixel.com/image_output/people-q-c-640-480-7.jpg">
	              </div>
	              <div class="card-content">
	                <span class="card-title activator grey-text text-darken-4">Wedding Event<i class="material-icons right">more_vert</i></span>
	                <p>Time : Date</p>
	              </div>
				  <div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Contact Info<i class="material-icons right">close</i></span>
					<p>We're lonely, please contact us.</p>
					<!-- Icon FB-->
					<a href="https://www.facebook.com/fionn.o.connor" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" border="0" margin="1px"></a>
					<!-- Icon twitter-->
					<a href="https://twitter.com/charliesheen" target="_blank"><img src="http://www.niftybuttons.com/scribble/twitter.png" border="0" margin="1px"></a>
					<!-- Icon G+-->
					<a href="https://plus.google.com/+DerekBridgeGooglePlus" target="_blank"><img src="http://www.niftybuttons.com/scribble/google.png" border="0" margin="1px"></a>
				  </div>
				</div>
			  </div>
			  <div class="col s6 m4 l3">
				<div class="card">
				  <div class="card-image waves-effect waves-block waves-light">
	                <img class="activator" src="http://lorempixel.com/image_output/nightlife-q-c-640-480-5.jpg">
	              </div>
	              <div class="card-content">
	                <span class="card-title activator grey-text text-darken-4">DJ Event<i class="material-icons right">more_vert</i></span>
	                <p>Time : Date</p>
	              </div>
				  <div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Contact Info<i class="material-icons right">close</i></span>
					<p>We're lonely, please contact us.</p>
					<!-- Icon FB-->
					<a href="https://www.facebook.com/fionn.o.connor" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" border="0" margin="1px"></a>
					<!-- Icon twitter-->
					<a href="https://twitter.com/charliesheen" target="_blank"><img src="http://www.niftybuttons.com/scribble/twitter.png" border="0" margin="1px"></a>
					<!-- Icon G+-->
					<a href="https://plus.google.com/+DerekBridgeGooglePlus" target="_blank"><img src="http://www.niftybuttons.com/scribble/google.png" border="0" margin="1px"></a>
				  </div>
				</div>
			  </div>
			  <div class="col s6 m4 l3">
				<div class="card">
				  <div class="card-image waves-effect waves-block waves-light">
	                <img class="activator" src="http://lorempixel.com/image_output/abstract-q-c-640-480-8.jpg">
	              </div>
	              <div class="card-content">
	                <span class="card-title activator grey-text text-darken-4">Art Event<i class="material-icons right">more_vert</i></span>
	                <p>Time : Date</p>
	              </div>
				  <div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Contact Info<i class="material-icons right">close</i></span>
					<p>We're lonely, please contact us.</p>
					<!-- Icon FB-->
					<a href="https://www.facebook.com/fionn.o.connor" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" border="0" margin="1px"></a>
					<!-- Icon twitter-->
					<a href="https://twitter.com/charliesheen" target="_blank"><img src="http://www.niftybuttons.com/scribble/twitter.png" border="0" margin="1px"></a>
					<!-- Icon G+-->
					<a href="https://plus.google.com/+DerekBridgeGooglePlus" target="_blank"><img src="http://www.niftybuttons.com/scribble/google.png" border="0" margin="1px"></a>
				  </div>
				</div>
			  </div>
			</div>
  </section>
	
  </div>
  
  <!--start of upcoming tab here-->
  <div id="upcoming" class="col s12">
		<h3 class="center-align col s12">Here are our upcoming events</h3>
		<div>
		<!--events will be pulled in here from the database base on upcoming events,perhaps based on location?-->
		<section>
			<div class="row">
			  <div class="col s6 m4 l3">
				<div class="card">
				  <div class="card-image waves-effect waves-block waves-light">
	                <img class="activator" src="http://lorempixel.com/image_output/people-q-c-640-480-7.jpg">
	              </div>
	              <div class="card-content">
	                <span class="card-title activator grey-text text-darken-4">Wedding Event<i class="material-icons right">more_vert</i></span>
	                <p>Time : Date</p>
	              </div>
				  <div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Contact Info<i class="material-icons right">close</i></span>
					<p>We're lonely, please contact us.</p>
					<!-- Icon FB-->
					<a href="https://www.facebook.com/fionn.o.connor" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" border="0" margin="1px"></a>
					<!-- Icon twitter-->
					<a href="https://twitter.com/charliesheen" target="_blank"><img src="http://www.niftybuttons.com/scribble/twitter.png" border="0" margin="1px"></a>
					<!-- Icon G+-->
					<a href="https://plus.google.com/+DerekBridgeGooglePlus" target="_blank"><img src="http://www.niftybuttons.com/scribble/google.png" border="0" margin="1px"></a>
				  </div>
				</div>
			  </div>
			  <div class="col s6 m4 l3">
				<div class="card">
				  <div class="card-image waves-effect waves-block waves-light">
	                <img class="activator" src="http://lorempixel.com/image_output/nightlife-q-c-640-480-5.jpg">
	              </div>
	              <div class="card-content">
	                <span class="card-title activator grey-text text-darken-4">DJ Event<i class="material-icons right">more_vert</i></span>
	                <p>Time : Date</p>
	              </div>
				  <div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Contact Info<i class="material-icons right">close</i></span>
					<p>We're lonely, please contact us.</p>
					<!-- Icon FB-->
					<a href="https://www.facebook.com/fionn.o.connor" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" border="0" margin="1px"></a>
					<!-- Icon twitter-->
					<a href="https://twitter.com/charliesheen" target="_blank"><img src="http://www.niftybuttons.com/scribble/twitter.png" border="0" margin="1px"></a>
					<!-- Icon G+-->
					<a href="https://plus.google.com/+DerekBridgeGooglePlus" target="_blank"><img src="http://www.niftybuttons.com/scribble/google.png" border="0" margin="1px"></a>
				  </div>
				</div>
			  </div>
			  <div class="col s6 m4 l3">
				<div class="card">
				  <div class="card-image waves-effect waves-block waves-light">
	                <img class="activator" src="http://lorempixel.com/image_output/abstract-q-c-640-480-8.jpg">
	              </div>
	              <div class="card-content">
	                <span class="card-title activator grey-text text-darken-4">Art Event<i class="material-icons right">more_vert</i></span>
	                <p>Time : Date</p>
	              </div>
				  <div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Contact Info<i class="material-icons right">close</i></span>
					<p>We're lonely, please contact us.</p>
					<!-- Icon FB-->
					<a href="https://www.facebook.com/fionn.o.connor" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" border="0" margin="1px"></a>
					<!-- Icon twitter-->
					<a href="https://twitter.com/charliesheen" target="_blank"><img src="http://www.niftybuttons.com/scribble/twitter.png" border="0" margin="1px"></a>
					<!-- Icon G+-->
					<a href="https://plus.google.com/+DerekBridgeGooglePlus" target="_blank"><img src="http://www.niftybuttons.com/scribble/google.png" border="0" margin="1px"></a>
				  </div>
				</div>
			  </div>
			</div>
     </section>
	</div>
  </div>
  
  <!--start of past events tab here-->
  <div id="past" class="col s12">
  		<h3 class="center-align col s12">Past events you have attended</h3>
  		<!--events must be pulled here based on what the user has attended in the past-->
		<div>
			<p class="center-align">
				you have not attended any events yet, what are you waiting for?
			</p>
		</div>
  </div>	

  <div id="searchTab" class="col s12">
	<section>
	  <section>
        <h4>Search for an event</h4>
        <p>Use the filters below to search for the perfect event for you</p>
      </section>
        <form class="col s12" action="#">
		  <div class="row">
			<div class="input-field col s6">
			  <i class="material-icons prefix">local_activity</i>
			  <input id="event_name" type="text" class="validate">
			  <label for="event_name">Event Name:</label>
			</div>
			  <div class="input-field col s6">
			  <i class="material-icons prefix">perm_identity</i>
			  <input id="organiser_name" type="text" class="validate">
			  <label for="organiser_name">Organiser Name:</label>
		    </div>
		  </div>
		  <div class="row">
			<div class="input-field col s6">
			  <i class="material-icons prefix">account_balance</i>
			  <input id="venue_name" type="text" class="validate">
			  <label for="venue_name">Venue Name:</label>
			</div>
			<div class="input-field col s6">
			    <select multiple>
			      <option value="" disabled selected>Choose your option</option>
			      <option value="1">Armagh</option>
			      <option value="2">Belfast</option>
			      <option value="3">Cork</option>
			      <option value="4">Derry</option>
			      <option value="5">Dublin</option>
			      <option value="6">Galway</option>
			      <option value="7">Kilkenny</option>
			      <option value="8">Limerick</option>
			      <option value="9">Lisburn</option>
			      <option value="10">Newry</option>
			      <option value="11">Waterford</option>
			    </select>
			    <label>Select Venue Location</label>
			</div>
		  </div>

		  <div class="row">
		    <p>
				Select what type/types of events you are looking for to refine the search:
			</p>
		  </div>
		  <div class="row">
			<div class="col s6 m3">
			  <input type="checkbox" id="music" />
			  <label for="music">Music</label>
			</div>
			<div class="col s6 m3">
			  <input type="checkbox" id="sport" />
			  <label for="sport">Sport</label>
			</div>
			<div class="col s6 m3">
			  <input type="checkbox" id="art" />
			  <label for="art">Art</label>
			</div>
			<div class="col s6 m3">
			  <input type="checkbox" id="social" />
			  <label for="social">Social</label>
			</div>
			<div class="col s6 m3">
			  <input type="checkbox" id="entertainment" />
			  <label for="entertainment">Entertainment</label>
			</div>
			<div class="col s6 m3">
			  <input type="checkbox" id="dance" />
			  <label for="dance">Dance</label>
			</div>
			<div class="col s6 m3">
			  <input type="checkbox" id="tech" />
			  <label for="tech">Tech</label>
			</div>
			<div class="col s6 m3">
			  <input type="checkbox" id="motor" />
			  <label for="motor">Motor</label>
			</div>	
		  </div>
		  <div class="col s3">
			<input type="submit" value="Search" class="btn"/>
		  </div>

		</form>
    </section>
  </div>
  
</div>
</main>
@stop