@extends('master')

@section('subtitulo','Crear Nuevo Usuario')

@section('content')
{{Form::open(['action'=>'HomeController@guardarUsuario','method'=>'POST'],['role'=>'form'])}}
	<!-- {{Form::label('Patente',null,['class'=>''])}} -->

	{{Form::text('nombre',null,['class'=>'','placeholder'=>'nombre'])}}

	{{Form::text('apellido',null,['class'=>'','placeholder'=>'apellido'])}}

	{{Form::password('password',null,['class'=>'','placeholder'=>'password'])}}

	{{Form::password('repassword',null,['class'=>'','placeholder'=>'repassword'])}}

	{{Form::email('email',null,['class'=>'','placeholder'=>'email'])}}

	{{Form::text('telefono',null,['class'=>'','placeholder'=>'telefono'])}}


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
	@if($errors->has('password'))
		{{$errors->first('password')}}
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
	@if($errors->has('repassword'))
		{{$errors->first('repassword')}}
	@endif

{{Form::close()}}
@endsection
