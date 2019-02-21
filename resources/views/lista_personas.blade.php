@extends('layouts.plantilla')

@section('contenido')
	<h1>Lista de personas</h1>
	<ul>
		@foreach($personas as $p)
			<li>{{ $p }} {!! $p !!}</li>
		@endforeach
	</ul>
@endsection

@section('script')
	<script>alert("probando....")</script>
@endsection