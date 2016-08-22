@extends('master')

@section('subtitulo','Modificar Usuario')
@section('content')
{{Form::open(['action'=>['HomeController@actualizarUsuario',$user->id],'method'=>'PUT'],['role'=>'form'])}}


	{{Form::text('nombre',$user->nombre,['class'=>'','placeholder'=>'nombre'])}}

	{{Form::text('apellido',$user->apellido,['class'=>'','placeholder'=>'apellido'])}}

	{{Form::text('email',$user->email,['class'=>'','placeholder'=>'email'])}}

	{{Form::text('telefono',$user->telefono,['class'=>'','placeholder'=>'telefono'])}}

	{{Form::submit('Guardar')}}

	<br>
	@if($errors->has('nombre'))
		{{$errors->first('nombre')}}
	@endif
	<br>
	@if($errors->has('apellido'))
		{{$errors->first('apellido')}}
	@endif
	<br>
	@if($errors->has('email'))
		{{$errors->first('email')}}
	@endif
	<br>
	@if($errors->has('telefono'))
		{{$errors->first('telefono')}}
	@endif
	<br>

{{Form::close()}}

@endsection
