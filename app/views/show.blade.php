@extends('layout')
@section('content')
<h1>{{ $user->name }}</h1>
{{ $user->stars }}
<p>{{ $user->organization }}</p>
<h2>Students</h2>
<div class="col-md-6">
	<table class="table">
	<tr>
		<th>Name</th>
		<th>Stars</th>
	</tr>
	@foreach($user->students as $student)
	<tr>
	<td>{{ $student->name }}</td>
	<td>
	<?php $stars = $student->stars; ?>
		@for ($i = 0; $i < $stars; $i++)
    	<span class = "glyphicon glyphicon-star"></span>
		@endfor

	</td>
	</tr>
	@endforeach
	</table>
</div>
@stop