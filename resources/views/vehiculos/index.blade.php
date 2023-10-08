@extends('../indexinicio')
@section('contenidobd')
<div class="container">
    <h1>Listado de Vehículos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Vehiculo</th> <!-- Nueva columna -->
                <th>Número de Placa</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ciudad</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->idvehiculo }}</td>
                    <td>{{ $vehiculo->numeroplaca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->marca_nombre }}</td>
                    <td>{{ $vehiculo->ciudad_nombre }}</td>
                    <td>{{ $vehiculo->departamento_nombre }}</td>
                    <td>
                        <form method="POST" action="{{ route('vehiculos.generar-reporte') }}">
                            @csrf
                            <input type="hidden" name="numeroplaca" value="{{ $vehiculo->numeroplaca }}">
                            <!-- Resto del formulario... -->
                            <button type="submit" class="btn btn-primary">Crear Reporte</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
