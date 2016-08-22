
<div class="container">
	@foreach ($users as $usr)
		@if($usr->isAdmin == 0)
			{{$usr->nombre}}
			{{$usr->apellido}}
			{{$usr->username}}
			{{$usr->password}}
			{{$usr->email}}
			 @if(Auth::user()->canEdit())
			{{HTML::link('/modificarUsuario/'.$usr->id,'modificar',['class'=>''])}}
			@endif
			@if(Auth::user()->canDelete())
				{{HTML::link('/eliminarUsuario/'.$usr->id,'eliminar',['class'=>''])}}
			@endif
			{{HTML::link('/verUsuario/'.$usr->id,'verUsuario',['class'=>''])}}
		@endif
		<br>
	@endforeach
</div>
