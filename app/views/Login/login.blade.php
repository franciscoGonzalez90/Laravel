@extends('master')


@section('subtitulo','Login')
@section('content')

	{{Form::open(['action'=>'LoginController@login','method'=>'POST'],['role'=>'form'])}}
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

	{{Form::label('username',null,['class'=>''])}}
	{{Form::text('username',null,['class'=>''])}}

	{{Form::label('password',null,['class'=>''])}}
	{{Form::password('password',null,['class'=>''])}}

	{{Form::submit('Log In',null,['class'=>''])}}

	<br>
	@if($errors->has('username'))
		{{$errors->first('password')}}
	@endif
	<br>
	@if($errors->has('password'))
		{{$errors->first('password')}}
	@endif
	<br>

	{{Form::close()}}
@endsection
