@extends('indexinicio')
@section('contenidobd')
<div class="container">
    <a href="{{ route('admifunciones.create') }}"><button class="btn btn-success">Crear</button></a>
    
    <!-- Formulario de búsqueda -->
    <form action="{{ route('admifunciones.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Buscar cliente...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table"> 
            <thead class="table-dark text-center">
                <tr>
                    <td>Codigo</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Ciudad</td>
                    <td>Departamento</td>
                    <td>Número de Documento</td>
                    <td>Acciones</td>
                </tr>
            </thead>
        
            <tbody class="table-group-divider">
                @forelse($clientes as $fila)
                @if($fila->activo == 1) 
                <tr>
                    <td>{{ $fila->idcliente }}</td>
                    <td>{{ $fila->nombre }}</td>
                    <td>{{ $fila->apellido }}</td>
                    <td>{{ $fila->ciudad_nombre }}</td>
                    <td>{{ $fila->departamento_nombre }}</td>
                    <td>{{ $fila->numerodocumento }}</td>
                    <td class="text-center">
                        <a href="{{ route('admifunciones.edit', $fila->idcliente) }}"><button class="btn btn-warning">Editar</button></a>
                        <a href="{{ route('admifunciones.desactivarCliente', $fila->idcliente) }}" onclick="return confirm('¿Está seguro de desactivar el cliente?')">
                            <button class="btn btn-danger">Desactivar</button>
                        </a>
                    </td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="7" class="text-center"><h1>No existen valores activos</h1></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
