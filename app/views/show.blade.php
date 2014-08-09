@extends('layout')
@section('content')
<div class="jumbotron">
	<h1>{{ $user->name }}</h1>
	<p>{{ $user->organization }}</p>
</div>
<h2>Students</h2>
<div class="col-md-6">
	<table class="table">
	<tr>
		<th>Name</th>
		<th>Stars</th>
	@foreach($user->students as $student)
		@if(Auth::check())
		@if(Auth::user()->id==$student->user_id)
		<th>Add</th>
		@endif
		@endif
	</tr>
	<tr>
		<td>{{ $student->name }}</td>
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
@stop