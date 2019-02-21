<!DOCTYPE html>
<html>
<head>
	<title>Personas PDF</title>
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<h1>Lista de Personas de la BD</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>Telefono</th>
				<th>Grupo</th>
				
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
			    </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>