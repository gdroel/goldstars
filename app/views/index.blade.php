@extends('layout')
@section('content')
	@if(Auth::check())
	<p>you are logged in as {{ Auth::user()->name }}</p>
	@endif

@stop