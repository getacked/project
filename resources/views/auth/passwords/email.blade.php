@extends('base')

@section('title')
Reset your password
@endsection


@section('content')

  <div class="container">
    <section>
      <h4>Reset your password</h4>
      <p>Enter email to reset password.</p>
      @if (session('status'))
            <p>
              {{ session('status') }}
            </p>
      @endif

      {{ Form::open(array('url' => url('/password/email'), 'method' => 'POST', 'class' => 'row')) }}
      <div class="row">
        <div class="input-field col s6">
          {{ Form::email('email', old('email'), ['class' => 'validate col'] ) }}
          {{ Form::label('email', 'Email') }}
        </div>

      </div>
          {{ Form::submit('Send password link', ['class' => 'btn']) }}
        {{ Form::close() }}

  </section>
</div>   
@stop