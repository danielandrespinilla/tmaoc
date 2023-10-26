@extends('../indexinicio')
@section('contenidobd')
<div class="container">
    <h1>Crear Nueva Revisión</h1>
    <form method="POST" action="{{ route('revisiones.store') }}">
        @csrf
        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="text" name="costo" class="form-control">
        </div>

        <div class="form-group">
            <label for="fecharevision">Fecha de Revisión</label>
            <input type="date" name="fecharevision" class="form-control">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" class="form-control">
        </div>

        <div class="form-group">
            <label for="cuandihizotcnmecanica">Cuando hizo Técnico Mecánica</label>
            <input type="text" name="cuandihizotcnmecanica" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Revisión</button>
    </form>
</div>
@endsection