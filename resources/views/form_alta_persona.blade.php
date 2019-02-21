@extends("layouts.plantilla")

@section("contenido")
	
	<form action="{{ route("inicio.add") }}" method="POST" role="form">
		{{ csrf_field() }}
		<legend>Alta Persona</legend>
	
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value="{{ old("nombre") }}">
			@if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group">
			<label for="tel">Telefono:</label>
			<input type="phone" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">
			@if ($errors->has('tel'))
                <span class="help-block">
                    <strong>{{ $errors->first('tel') }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group">
			<label for="dire">Dirección:</label>
			<input type="text" class="form-control" id="dire" name="dire">
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
		
	
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
	<br />
@endsection

@section("script")
	<script>
		$(document).ready(function() {
			@if(old("gpo") != "")
				$("#gpo").val('{{ old("gpo") }}');	
			@endif
		});
	</script>

@endsection