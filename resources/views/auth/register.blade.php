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

        @include('forms.register')
       
      </section>
    </div>
  
  </div>
@endsection   


@section('scripts')

<script>

$(document).ready(function(){


  $("input:radio[name='type']").click(function() {
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
