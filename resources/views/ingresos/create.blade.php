@extends('../indexinicio')
@section('contenidobd')

<form method="POST" action="{{ route('ingresos.store') }}">
    @csrf
    <div class="form-group">
        <label for="numeroplaca">Número de Placa</label>
        <input type="text" name="numeroplaca" class="form-control">
    </div>
    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" class="form-control">
    </div>
    <div class="form-group">
        <label for="nombre_marca">Nombre de la Marca</label>
        <input type="text" name="nombre_marca" class="form-control">
    </div>
    <div class="form-group">
        <label for="fechahoraingreso">Fecha y Hora de Ingreso</label>
        <input type="datetime-local" name="fechahoraingreso" class="form-control">
    </div>
    <div class="form-group">
        <label for="fechahorasalida">Fecha y Hora de Salida</label>
        <input type="datetime-local" name="fechahorasalida" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
