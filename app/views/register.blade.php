{{ Form::open(array('action'=>'HomeController@doRegister')) }}
{{ Form::label('name', 'Name')}}
{{ Form::text('name') }}

{{ Form::label('organization', 'Organization')}}
{{ Form::text('organization') }}

{{ Form::label('email', 'Email')}}
{{ Form::text('email') }}

{{ Form::label('username', 'Username')}}
{{ Form::text('username') }}

{{ Form::label('password', 'Password')}}
{{ Form::password('password') }}

{{ Form::submit('Register') }}
{{ Form::close() }}
