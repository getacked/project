<div id="createEvent" class="col s12">
			<h2 class="center"> Create an Event! </h2>

			<form method="POST"   action="http://test.app/events" accept-charset="UTF-8"><input name="_token" type="hidden" value="TSd22ORhx8WRCzHULWCJVTeoft9KrW2zRJocrNKE">
			  
			 <div class="row">
			  <div class="input-field col s6">
			    <input class="validate col" name="event_name" type="text">
			    <label for="event_name">Event Name</label>
			  </div>
			 </div>
			 <div class="row">
			 <div class="input-field col s6">
			    <select name="type" class="browser-default">
			      <option value="" disabled selected>Choose an event category</option>
			      <option value="music">Music</option>
			      <option value="comedy">Comedy</option>
			      <option value="conference">Conference</option>
			      <option value="talk">Talk</option>
			    </select>
			    <label for="type"></label>
			  </div>
			</div>
			  <div class="row">
		        <div class="input-field col s12">
		          <textarea id="description" class="materialize-textarea"></textarea>
		          <label for="description">Event Description</label>
		        </div>
		      </div>
			   
			<div class="row">
			  <div class="input-field col s2">
			     <input type="text" class="form-control " name="event_time1"  length="2">
			     <label for="event_time1">(00-24)Hrs</label>
			  </div> 
			  <div class="input-field col s2">
			     <input type="text" class="form-control" name="event_time2"  length="2">
			     <label for="event_time2">(00-59)Mins</label>
			  </div> 
			  <div class="input-field col s6">
			    <input name="event_date" type="date" class="datepicker col s6">
			    <label for="event_date">Click me to select date</label>
			  </div>
			</div>
			<div class="row">
				<div class="col s4">
					<p>
						Would you like to register a new venue for your event?
					</p>	
				    <p>
				      <input name="group1" type="radio" id="test1" value="one" checked />
				      <label for="test1">No</label>
				    </p>
				    <p>
				      <input name="group1" type="radio" id="test2" value="two" />
				      <label for="test2">Yes</label>
				    </p>
				 </div>
				 <div id="elements_to_hide">
				    <!--these must be pulled from the db-->
				 	<div class="input-field col s4 offset-s1">
						    <select>
						      <option value="" disabled selected>Choose your option</option>
						      <option value="v1">Savoy</option>
						      <option value="v2">02 arena</option>
						      <option value="v3">Croke park</option>
						    </select>
						    <label>Select Venue</label>
					 </div>
				 </div>

			</div>
			
			<div id="hidden_elements">
				  <div class="row">
				   <div class="input-field col s4" >
				    <input name="vname" type="text">
				    <label for="vname">Venue name</label>
				  </div>
				  <div class="input-field col s4" >
				    <input name="location1" type="text">
				    <label for="location1">Address line 1
				    </label>
				  </div>
				 </div>
				  <div class="row">
				   <div class="input-field col s4" >
				    <input name="location2" type="text">
				    <label for="location2">Address line 2</label>
				  </div>
				  <div class="input-field col s4" >
				    <input name="location3" type="text">
				    <label for="location3">Address line 3
				    </label>
				  </div>
				 </div>
				 <div class="row">
					 <div class="input-field col s4">
						    <select>
						      <option value="" disabled selected>Choose your option</option>
						      <option value="c1">Armagh</option>
						      <option value="c2">Belfast</option>
						      <option value="c3">Cork</option>
						      <option value="c4">Derry</option>
						      <option value="c5">Dublin</option>
						      <option value="c6">Galway</option>
						      <option value="c7">Kilkenny</option>
						      <option value="c8">Limerick</option>
						      <option value="c9">Lisburn</option>
						      <option value="c10">Newry</option>
						      <option value="c11">Waterford</option>
						    </select>
						    <label>Select Venue Location</label>
					 </div>
					  <div class="input-field col s4" >
					    <input name="location4" type="text">
					    <label for="location4">County</label>
					  </div>
				</div>
			</div>
			<div class="row">
			 <div class="input-field col s4">
			    <input name="tickets" type="text">
			    <label for="tickets">Number of Tickets</label>
			  </div>
			</div>

			  <input name="_token" type="hidden" value="TSd22ORhx8WRCzHULWCJVTeoft9KrW2zRJocrNKE">

			  <input class="btn" type="submit" value="Sign up!">
			  </form>
		  </div>
		