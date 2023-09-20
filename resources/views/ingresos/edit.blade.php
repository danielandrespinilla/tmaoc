@extends('../indexinicio')
@section('contenidobd')
<div class="container">
    <h1>Editar Ingreso</h1>
    <form action="{{ route('ingresos.update', $ingreso->idingreso) }}" method="POST">
        @csrf
        @method('PUT')
            {{-- Agrega los campos numeroplaca, modelo y nombre de la tabla marcas --}}
        <div class="form-group">
            <label for="numeroplaca">Número de Placa</label>
            <input type="text" name="numeroplaca" class="form-control" value="{{ $ingreso->numeroplaca }}">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ $ingreso->modelo }}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre de la Marca</label>
            <input type="text" name="nombre" class="form-control" value="{{ $ingreso->nombre }}">
        </div>
        
        <div class="form-group">
            <label for="fechahoraingreso">Fecha y Hora de Ingreso</label>
            <input type="datetime-local" name="fechahoraingreso" class="form-control" value="{{ $ingreso->fechahoraingreso }}">
        </div>
        <div class="form-group">
            <label for="fechahorasalida">Fecha y Hora de Salida</label>
            <input type="datetime-local" name="fechahorasalida" class="form-control" value="{{ $ingreso->fechahorasalida }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
