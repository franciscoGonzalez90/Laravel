@extends('master')

<div class="container">
@section('content')
		@if($usr->isAdmin == 0)
			{{$usr->nombre}}
			{{$usr->apellido}}
			{{$usr->username}}
			{{$usr->password}}
			{{$usr->email}}
			 @if(Auth::user()->canEdit())
			{{HTML::link('/modificarUsuario/'.$usr->id,'modificar',['class'=>''])}}
			@endif
			@if(Request::path() !== 'verUsuario/'.$usr->id)
			{{HTML::link('/verUsuario/'.$usr->id,'verUsuario',['class'=>''])}}
			@endif
		@endif
		<br>
@endsection
</div>