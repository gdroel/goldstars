@extends('layout')
@section('content')
	@if(Auth::check())
	<p>you are logged in as {{ Auth::user()->name }}</p>
	@endif

	<h1>Students</h1>
	@foreach($students as $student)
		<li>{{ $student->name }} | {{ $student->stars }} | </li>
		
		@if(Auth::check())
			@if(Auth::user()->id==$student->user_id)

			{{ Form::open(array('action'=>'HomeController@addStar'))}}
			{{ Form::hidden('id', $student->id) }}
			{{ Form::hidden('user_id', $student->user_id)}}
			{{ Form::submit('+')}}
			{{ Form::close() }}

			@endif
		@endif
	@endforeach

	<h1>Pastors</h1>
	@foreach($users as $user)
	<h2>{{ $user->name }}</h2>
	<h3>{{ $user->organization}}</h3>
		@foreach($user->students as $student)
		<li>{{ $student->name }}</li>
		@endforeach
	@endforeach
@stop