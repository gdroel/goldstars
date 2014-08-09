@extends('layout')
@section('content')
<div class="jumbotron">
	<h1 class="movedown">{{ $user->name }}</h1>
	<p>{{ $user->organization }}</p>
</div>
<div class="container">
<div class="col-md-8">
	<h2>Students</h2>
	<h3><a href="{{ action('HomeController@showCreate') }}">Add +</a></h3>
	<hr>
	<table class="table">
	<tr>
		<th>Name</th>
		<th>Stars</th>
		@foreach($user->students as $student)
	</tr>
	<tr>
		<td><p>{{ $student->name }}</p></td>
	<td>
	<?php $stars = $student->stars; ?>


	@for ($i = 0; $i < $stars; $i++)
	<span class = "glyphicon glyphicon-star" id="star"></span>
	@endfor
	</td>
	<td>
		@if(Auth::check())
			@if(Auth::user()->id==$student->user_id)

			{{ Form::open(array('action'=>'HomeController@addStar'))}}
			{{ Form::hidden('id', $student->id) }}
			{{ Form::hidden('user_id', $student->user_id)}}
			{{ Form::submit('+')}}
			{{ Form::close() }}

			@endif
		@endif
	</td>
	</tr>
	@endforeach
	</table>
</div>
</div><!--Container-->
@stop