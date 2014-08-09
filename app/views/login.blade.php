@extends('layout')
@section('content')
<div class="container movedown">
	<div class="col-md-4 col-md-offset-4 text-center" id="login">
	<h2>Login</h2>
	{{ Form::open(array('action' => 'HomeController@doLogin')) }}

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email','class'=>'form-control')) }}
		</p>

		<p>
			{{ Form::password('password', array('class'=>'form-control','placeholder'=>'Password')) }}
		</p>

		<p>{{ Form::submit('Login',array('class'=>'btn btn-success')) }}</p>
		
	{{ Form::close() }}
	</div>
</div>
@stop