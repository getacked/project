@extends('base')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row">
	<div class="col s12">
		<ul class="tabs">
			<li class="tab col s3"><a href="#dashboard" class="active">Dashboard</a></li>
			<li class="tab col s3"><a href="#upcoming">Upcoming</a></li>
			<li class="tab col s3"><a href="#past">Past Events</a></li>
			<li class="tab col s3"><a href="#searchTab">Search</a></li>
		</ul>
	</div>
 </div>
 
 <div class="container">

	@include('users.dashboard.tabs.landing-normal')

	@include('users.dashboard.tabs.upcoming')
  
	@include('users.dashboard.tabs.past')

	@include('users.dashboard.tabs.search')

</div>
@stop

@section('scripts')
<script src="/js/dash-tag-handler.js"></script>
@stop
