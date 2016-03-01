@extends('base')

@section('title')
Sign Up
@endsection


@section('content')

  <div class="container">
    <div id="attendee" class="col s12">
      <section>
        <h4>User Sign Up</h4>
        <p>First just a few details about you - because we think you're cool and want to know you better.</p>

        @include('partials.errors')

        {{ Form::open(array('url' => '/register', 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}


          <p>
            <div class="center"> So would you like to organize events or attend events? Select your option below!</p>
            <p class="row center">
              {{ Form::radio('user_type', '0', false, array('id' => 'regular', 'class' => 'with-gap') )  }}
              {{ Form::label('regular', 'Attendee') }}
      
              {{ Form::radio('user_type', '1', false, array('id' => 'host', 'class' => 'with-gap') )  }}
              {{ Form::label('host', 'Host') }}
            </p>
          </div>



          <div class="input-field">
            <i class="material-icons prefix">group</i>
            {{ Form::text('username',  old('username'), ['class' => 'validate col'] ) }}
            {{ Form::label('username', 'Username') }}
          </div>

          <div class="row" id="host_form" style="display: none">
            <div class="input-field">
              <i class="material-icons prefix black-text">description</i>      
              {{ Form::textarea('description', null, array('placeholder' => "Give a description of the kind of events you'll be doing", 'class' => 'materialize-textarea')) }}
              {{ Form::label('description')}}
            </div>
          </div>


          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              {{ Form::text('first_name',  old('first_name'), ['class' => 'validate'] ) }}
              {{ Form::label('first_name', 'First Name') }}
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">assignment_ind</i>
              {{ Form::text('last_name',  old('last_name'), ['class' => 'validate'] ) }}
              {{ Form::label('last_name', 'Surname') }}
            </div>
          </div>


          <div class="row">
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">email</i>
              {{ Form::email('email', old('email'), ['class' => 'validate'] ) }}
              {{ Form::label('email', 'Email') }}
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">phone</i>             
              {{ Form::text('tel_no',  old('tel_no'), ['class' => 'validate'] ) }}
              {{ Form::label('tel_no', 'Telephone Number: (Required for hosts)*') }}
            </div>
          </div>




          <div class="row" id="user_form" style="display: none">
            <p>
        



            </p>
          </div>

          <div class="row">
            <div class="input-field col s12">
             <i class="material-icons prefix">vpn_key</i>
             {{ Form::password('password', ['class' => 'validate']) }}
             {{ Form::label('password', 'Password')  }}
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
               <i class="material-icons prefix">vpn_key</i>
                {{ Form::password('password_confirmation', ['class' => 'validate']) }}
                {{ Form::label('password_confirmation', 'Confirm Password')  }}
             </div>
          </div>

          <div>
            <h5>Upload a photo for your profile? </h5>
            <div class="file-field input-field">
              <div class="btn">
                <span>Photo</span>
                <input type="file" name="image">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>

          <div class="center">
            {{ Form::submit('Create your account!', ['class' => 'btn-large']) }}
          </div>

        {{ Form::close() }}
       
      </section>
    </div>
  
  </div>
@endsection   


@section('scripts')

<script>

$(document).ready(function(){


  $("input:radio[name='user_type']").click(function() {
    if (this.value == "1") {  //host is chosen
      $("#host_form").css("display", "block");
      $("#user_form").css("display", "none");
     } else {                 //user is chosen
      $("#host_form").css("display", "none");
      $("#user_form").css("display", "block");
     }
  });

});
</script>



@endsection
