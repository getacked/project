@extends('base')

@section('title')
    Contact Us!
@endsection


@section('content')
<div class="container" id="login-container">
    <section>
        <h4>Have a Burning Question on Your Mind?</h4>
        @include('partials.message')
        <p>
            Feel free to drop an email in to one of our staff members below!
        </p>
    </section>
    
    <section>
        @include('partials.errors')
        @include('forms.contact')
    </section>
</div>

@endsection
