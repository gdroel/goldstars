{{ Form::open(array('action'=>'HomeController@doCreate')) }}

{{ Form::text('name') }}
{{ Form::hidden('user_id', Auth::user()->id)}}

{{ Form::submit() }}
{{ Form::close() }}