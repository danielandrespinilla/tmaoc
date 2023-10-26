@extends('../indexinicio')
@section('contenidobd')
<div class="container">
    <h1>Listado de Vehículos</h1>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('vehiculos.buscar') }}" class="form-inline mb-2">
        @csrf
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por número de placa o modelo">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <a href="{{ route('vehiculos.create') }}"><button class="btn btn-success">Crear</button></a>

    <table class="table">
        <thead>
            <tr>
                <th>ID Vehiculo</th>
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
                        <a href="{{ route('vehiculos.edit',$vehiculo->idvehiculo) }}"><button class="btn btn-warning">Editar</button></a>
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
