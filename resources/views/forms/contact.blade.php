{{ Form::open(array('url' => '/contact', 'method' => 'POST', 'class' => 'col s12')) }}
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            {{ Form::text('name',  null, ['class' => 'validate'] ) }}
            {{ Form::label('name', 'Name:') }}
        </div>
    
        <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            {{ Form::email('email', null, ['class' => 'validate'] ) }}
            {{ Form::label('email', 'Email', ['data-error' => 'wrong', 'data-success' => 'right'] ) }}
        </div>
    </div>
   
    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">mode_edit</i>
            <textarea name="message" id="message" class="materialize-textarea"></textarea>
            <label for="message">Message:</label>
        </div>
    </div>
   
    <div class="col s3">
        <input type="submit" value="Ask!" class="btn"/>
    </div>
{{ Form::close() }}