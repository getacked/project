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