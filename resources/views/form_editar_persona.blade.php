@extends("layouts.plantilla")

@section("contenido")
	@if($p != null)
	<form action="{{ route("inicio.edit",$p->idP) }}" method="POST" role="form">
		{{ csrf_field() }}
		<legend>Editar Persona</legend>
	
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $p->nombre }}">
			@if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group">
			<label for="tel">Telefono:</label>
			<input type="phone" class="form-control" id="tel" name="tel" value="{{ $p->telefono }}">
			@if ($errors->has('tel'))
                <span class="help-block">
                    <strong>{{ $errors->first('tel') }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group">
			<label for="dire">Dirección:</label>
			<input type="text" class="form-control" id="dire" name="dire" value="{{ $p->direccion }}">
			@if ($errors->has('dire'))
                <span class="help-block">
                    <strong>{{ $errors->first('dire') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group">
			<label for="gpo">Grupo:</label>
			<select name="gpo" id="gpo" class="form-control">
				@foreach($grupos as $g)
					<option value="{{ $g->idG }}">{{ $g->descripcion }}</option>
				@endforeach
			</select>
			@if ($errors->has('gpo'))
                <span class="help-block">
                    <strong>{{ $errors->first('gpo') }}</strong>
                </span>
            @endif
		</div>
		
	
		<button type="submit" class="btn btn-primary">Editar</button>
	</form>
	@else
		<h1>No se encontro el registro</h1>
	@endif
	<br />
@endsection

@section("script")
	@if($p != null)
		<script>
			$(document).ready(function() {
				$("#gpo").val('{{ $p->grupo }}');
			});
		</script>
	@endif
@endsection