@extends('../indexinicio')
@section('contenidobd')

<form method="POST" action="{{ route('ingresos.store') }}">
    @csrf
    
    <div class="form-group">
        <label for="fechahoraingreso">Fecha y Hora de Ingreso</label>
        <input type="datetime-local" name="fechahoraingreso" class="form-control">
    </div>
    <div class="form-group">
        <label for="fechahoradiagnostico">Fecha y Hora de Diagnóstico</label>
        <input type="datetime-local" name="fechahoradiagnostico" class="form-control">
    </div>
    <div class="form-group">
        <label for="fechahorasalida">Fecha y Hora de Salida</label>
        <input type="datetime-local" name="fechahorasalida" class="form-control">
    </div>
   
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
