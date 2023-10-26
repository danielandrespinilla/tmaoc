@extends('../indexinicio')
@section('contenidobd')
<div class="container">
    <h1>Editar Revisión</h1>
    <form action="{{ route('revisiones.update', $revision->first()->idrevision) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="text" name="costo" class="form-control" value="{{ $revision->costo }}">
        </div>

        <div class="form-group">
            <label for="fecharevision">Fecha de Revisión</label>
            <input type="date" name="fecharevision" class="form-control" value="{{ $revision->fecharevision }}">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" class "form-control" value="{{ $revision->estado }}">
        </div>

        <div class="form-group">
            <label for="cuandihizotcnmecanica">Cuando hizo Técnico Mecánica</label>
            <input type="text" name="cuandihizotcnmecanica" class="form-control" value="{{ $revision->cuandihizotcnmecanica }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Revisión</button>
    </form>
</div>
@endsection
