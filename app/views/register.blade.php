@extends('layout')

@section('content')
<div class="container movedown">

	<div class="col-md-4 col-md-offset-4 text-center" id="login">
	<h2>Register as a Leader</h2>

	{{ Form::open(array('action'=>'HomeController@doRegister')) }}

	{{ Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name')) }}
	<br>
	{{ Form::text('organization',null,array('class'=>'form-control','placeholder'=>'Organization')) }}
	<br>
	{{ Form::text('email',null,array('class'=>'form-control','placeholder'=>'Email')) }}
	<br>
	{{ Form::text('username',null,array('class'=>'form-control','placeholder'=>'Create a Username')) }}
	<br>
	{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Create a Password')) }}
	<br>
	{{ Form::submit('Register', array('class'=>'btn btn-success')) }}
	{{ Form::close() }}
	</div>
</div>
@stop