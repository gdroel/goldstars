@extends('layout')

@section('content')
<div class="jumbotron">
	<h1 class="movedown">Search Results</h1>
</div>

<div class="container">
@foreach($students as $student)
	<div class="col-md-4">
		<h3>{{ $student->name }}</h3>
		<p><a href="{{ action('HomeController@show', $student->user->id) }}">{{ $student->user->name }} | {{$student->user->organization}}</a></p>
		<?php $stars = $student->stars; ?>


		@for ($i = 0; $i < $stars; $i++)
		<span class = "glyphicon glyphicon-star" id="star"></span>
		@endfor	
	</div>
@endforeach
</div>
@stop
