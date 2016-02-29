@extends('base')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row">
	<div class="col s12">
		<ul class="tabs">
			<li class="tab col s3"><a href="#dashboard" class="active">Dashboard</a></li>
			<li class="tab col s3"><a href="#past">My Past Events</a></li>
		</ul>
	</div>
 </div>
 
 <div class="container">

	@include('users.dashboard.tabs.landing-organiser')
  
	@include('users.dashboard.tabs.past')

</div>
@stop

@section('scripts')
<script>
	$( document ).ready(function() {
		$(".dropdown-button").dropdown();
		$('.slider').slider({full_width: true});
		$('.parallax').parallax();
		$('select').material_select();
	    $("#hidden_elements").css("display", "none");

			 $("input:radio[name='group1']").click(function(){
			  if (this.value == "two") {
			  	$("#hidden_elements").css("display", "block");
			  	$("#elements_to_hide").css("display", "none");
		   } else {
		    $("#hidden_elements").css("display", "none");
		    $("#elements_to_hide").css("display", "block");
		   }

		});
		
	});
</script>
@stop