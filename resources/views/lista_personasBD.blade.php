@extends("layouts.plantilla")
@section("contenido")
@if($error > -1)
	<div class="alert alert-info">
		@if($error == 0)
			<b>Proceso completo</b>
		@else
			<b>Error al realizar el proceso</b>	
		@endif
	</div>
@endif
<br />
<a href="{{ route("inicio.agregarPersona") }}" class="btn btn-primary">Agregar</a>
<a href="{{ route("inicio.pdf") }}" class="btn btn-success" target="__new">PDF</a>
	<h1>Lista de Personas de la BD</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>Telefono</th>
				<th>Grupo</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $x = 1; ?>
			@foreach($personas as $p)
			    <tr>
				  <td>{{ $x++ }}</td>
				  <td>{{ $p->nombre }}</td>
				  <td>{{ $p->direccion }}</td>
				  <td>{{ $p->telefono }}</td>
				  <td>{{ $p->descripcion }}</td>
				  <td>
				  	<a href="{{ route("inicio.frmEditar",$p->idP) }}">Editar</a> |
				  	<a href="{{ route("inicio.eliminar",$p->idP) }}" onclick="return eliminar('{{ $p->nombre }}')">Eliminar</a>
				  </td>
			    </tr>
			@endforeach
		</tbody>
	</table>
@endsection
@section("script")
	<script>
		function eliminar(m){
			var r = confirm("¿Desea eliminar el registro ["+m+"]?");
			if(!r)
				return false;
		}
	</script>
@endsection