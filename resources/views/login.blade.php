{{ Form::open(array('url' => 'doLogin')) }}
<h1>Login</h1>



<p>
    {{ Form::label('email', 'name') }}
    {{ Form::text('name','', array('placeholder' => '')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}