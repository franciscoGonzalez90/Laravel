@extends('master')

@section('menu')
@parent
@endsection

@section('content')
	@section('subtitulo','Todos los usuarios')
	@include('vehiculo.verVehiculos')
@endsection