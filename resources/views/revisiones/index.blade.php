@extends('../indexinicio')
@section('contenidobd')
    <div class="container">
        <h1>Buscar Revisiones</h1>

        <form method="GET" action="{{ route('revisiones.buscar') }}" class="form-inline mb-2">
            @csrf
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por Número de Placa, Modelo o Marca">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <a href="{{ route('revisiones.create') }}" class="btn btn-primary">Crear revisiones</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Revisión</th>
                    <th>Número de Placa</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Costo</th>
                    <th>Fecha de Revisión</th>
                    <th>Estado</th>
                    <th>Cuándo Hizo Técnico Mecánica</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($revisiones as $fila)
                    <tr>
                        <td>{{ $fila->idrevision }}</td>
                        <td>{{ $fila->numeroplaca }}</td>
                        <td>{{ $fila->modelo }}</td>
                        <td>{{ $fila->marca_nombre }}</td>
                        <td>{{ $fila->costo }}</td>
                        <td>{{ $fila->fecharevision }}</td>
                        <td>{{ $fila->estado }}</td>
                        <td>{{ $fila->cuandihizotcnmecanica }}</td>
                        <td>
                            <a href="{{ route('revisiones.edit', $fila->idrevision) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="{{ route('revisiones.report', $fila->idrevision) }}" class="btn btn-success">Generar Reporte</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
