@extends('header')

@section('content')
    {{ Form::open(array('url' => 'doLogin')) }}
<h1>Login</h1>


<table>
    <tr>
        <td>{{ Form::label('email', 'name') }}</td>
        <td>{{ Form::text('name','', array('placeholder' => '')) }}</td>
    </tr>
    <tr>
        <td>{{ Form::label('password', 'Password') }}</td>
        <td>{{ Form::password('password') }}</td>
    </tr>
    <tr>
        <td><p>{{ Form::submit('Submit!') }}</p>
            {{ Form::close() }}</td>
    </tr>
</table>
<p>


</p>

<p>


</p>
<hr>

<p>Updates</p>
<table border="1">
    <tr>
        <td>VERSION</td>
        <td>DATE</td>
        <td>UPDATES</td>
    </tr>
    <tr>
        <td>1</td>
        <td>1.24.2018</td>
        <td> Level of Resources accumalated is now based on level/50 rounded up</td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td> Clicking user name lets you view users achivements</td>
    </tr>

</table>

@endsection

