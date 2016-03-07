@extends('base')

@section('content')
<div class="container">
	<section>
		<h4>Edit Profile Data</h4>
	</section>

	@include('partials.message')

	@include('partials.errors')

	{{ Form::open(array('route' => array('user.update', $user), 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'col s12') ) }}
		<div class="row">
			<div class="file-field input-field">
				<div class="btn">
					<span>Upload profile photo</span>
					<input type="file" name="image">
				</div>
				
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">email</i>
				<input id="email" type="email" class="validate" value="{{ $user->email }}" name="email">
				<label for="email">Email</label>
			</div>
			
			<div class="input-field col s6">
				<i class="material-icons prefix">phone</i>
				<input id="icon_telephone" type="tel" class="validate" value="{{ $user->tel_no }}" name="tel_no">
				<label for="icon_telephone">Telephone (Optional):</label>
			</div>
		</div>
		
		@if($user->hasType('host'))
			<div class="row">
				<div class="input-field col s12">
					<textarea id="description" class="materialize-textarea" name="description">{{ $user->description }}</textarea>
					<label for="description">Organiser Description</label>
				</div>
			</div>
		@endif

		{{ Form::submit('Update', ['class' => 'btn']) }}

	{{ Form::close() }}
</div>

@endsection

