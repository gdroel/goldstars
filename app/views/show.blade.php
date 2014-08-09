@extends('layout')
@section('content')
<h1>{{ $user->name }}</h1>
{{ $user->stars }}
<h2>Students</h2>
<table class="table">
@foreach($user->students as $student)
	<li>{{ $student->name }}</li>
@endforeach
</table>
@stop