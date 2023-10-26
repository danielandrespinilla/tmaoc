@extends('../indexinicio')
@section('contenidobd')
<div class="container">
    <h1>Editar Ingreso</h1>
    <form action="{{ route('ingresos.update', $ingreso->idingreso) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="fechahoraingreso">Fecha y Hora de Ingreso</label>
            <input type="datetime-local" name="fechahoraingreso" class="form-control" value="{{ $ingreso->fechahoraingreso }}">
        </div>
        <div class="form-group">
            <label for="fechahoradiagnostico">Fecha y Hora de Diagnóstico</label>
            <input type="datetime-local" name="fechahoradiagnostico" class="form-control" value="{{ $ingreso->fechahoradiagnostico }}">
        </div>
        <div class="form-group">
            <label for="fechahorasalida">Fecha y Hora de Salida</label>
            <input type="datetime-local" name="fechahorasalida" class="form-control" value="{{ $ingreso->fechahorasalida }}">
        </div>
      
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
