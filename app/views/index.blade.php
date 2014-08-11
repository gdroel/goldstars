@extends('layout')
@section('content')
<div id="bg1">
	<div class="jumbotron text-center">
		<h1 class="centered movedown">All that Glitters is Gold.</h1>
		<p class="centered">Gold Stars for the Modern Age.</p>
		<a class="btn btn-info" href="{{ action('HomeController@showRegister') }}">Sign Up as a Leader</a>
	</div>
</div>
<div class="container">
	<div class="row movedown">
		<div class="col-sm-4 info">
			<h3>For Leaders:</h3>
			<hr>
			<h4>1. <a class="gray" href="{{ action('HomeController@showRegister') }}">Sign up</a> as a Leader</h4>
			<h4>2. Add Your Students.</h4>
			<h4>3. Lavish them with Gold Stars.</h4>
		</div>
		<div class="col-sm-4 info">
			<h3>For Students:</h3>
			<hr>
			<h4>1. Search your Name.</h4>
			<h4>2. Get your Stars.</h4>
			<h4>3. Beat your Friends.</h4>
		</div>
		<div class="col-sm-4 info">
			<h3>Recent Users</h3>
			<hr>
			@if($users!="")
			@foreach($users as $user)
			<h4><a class="black" href="{{ action('HomeController@show',$user->id) }}">{{ $user->name }}</a></h4>
			@endforeach
			@endif
	

		</div>
	</div>
</div><!--Container-->
@stop