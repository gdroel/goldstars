@extends('layout')

@section('content')
<div class="container movedown">
<div class="col-md-4 col-md-offset-4 text-center" id='login'>
<h2 class="centered">Add a Student</h2>
{{ Form::open(array('action'=>'HomeController@doCreate')) }}

{{ Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name')) }}
{{ Form::hidden('user_id', Auth::user()->id)}}
<br>
{{ Form::submit('Add Student', array('class'=>'btn btn-success submit')) }}
{{ Form::close() }}
</div>
</div>
@stop