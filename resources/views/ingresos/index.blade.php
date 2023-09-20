@extends('../indexinicio')
@section('contenidobd')
<div class="container">
    <h1>Listado de Ingresos</h1>

    <!-- Agrega un enlace para crear un nuevo ingreso -->
    <a href="{{ route('ingresos.create') }}" class="btn btn-primary">Crear Ingreso</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Placa</th>
                <th>Modelo</th>
                <th>Marca del Vehículo</th>
                <th>Fecha y Hora de Ingreso</th>
                <th>Fecha y Hora de Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($ingresos as $fila)
            <tr>
                <td>{{ $fila->idingreso }}</td>
                <td>{{ $fila->numeroplaca }}</td>
                <td>{{ $fila->modelo }}</td>
                <td>{{ $fila->nombre_marca }}</td>
                <td>{{ $fila->fechahoraingreso }}</td>
                <td>{{ $fila->fechahorasalida }}</td>
                <td>
                    <a href="{{ route('ingresos.edit', $fila->idingreso) }}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7"><h1>No existen valores</h1></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
