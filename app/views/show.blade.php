@extends('layout')
@section('content')
<div class="jumbotron">
	<h1 class="movedown">{{ $user->name }}</h1>
	<p>{{ $user->organization }}</p>
</div>
<div class="container">
<div class="col-md-8">
	<h2>Students</h2>
	@if(Auth::check())
	<h3 id="addbutton"><a>Add +</a></h3>
		{{ Form::open(array('action'=>'HomeController@doCreate','id'=>"addform")) }}
		<div class="form-inline">
		{{ Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name'))}}
		{{ Form::hidden('user_id', Auth::user()->id)}}
		{{ Form::submit('Add',array('class'=>'btn btn-success')) }}
		</div>
		{{ Form::close() }}
	@endif
	<hr>
	<table class="table">
	<tr>
		<th>Name</th>
		<th>Stars</th>
		<th>
		@if(Auth::check())
			@if(Auth::user()->id==$user->id)

				Add

			@endif
		@endif
		</th>
		@foreach($user->students as $student)
	</tr>
	<tr>
		<td><p>{{ $student->name }}</p></td>
	<td>
	<?php $stars = $student->stars; ?>


	@for ($i = 0; $i < $stars; $i++)
	<a id="update" href="#"><span class = "glyphicon glyphicon-star star" id="star"></span></a>
	@endfor
	</td>
	<td>
		@if(Auth::check())
			@if(Auth::user()->id==$student->user_id)

			{{ Form::open(array('action'=>'HomeController@addStar','id'=>'addStar','method'=>'post'))}}
			{{ Form::hidden('id', $student->id, array('id'=>'id_value')) }}
			{{ Form::hidden('user_id', $student->user_id, array('id'=>'user_id_value'))}}
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
<script>
$(document).ready(function(){

	$("#addform").hide();
	$("#addbutton").click(function(){

		$("#addform").show();
	});

});
	



</script>
@stop