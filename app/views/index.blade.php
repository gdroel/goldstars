@extends('layout')
@section('content')
<div id="bg1">
	<div class="jumbotron">
		<h1 class="centered movedownmore">All that Glitters is Gold.</h1>
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
			<h3>Students:</h3>
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