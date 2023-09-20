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
                    <td>Número de Documento</td>
                    <td>Acciones</td>
                </tr>
            </thead>
        
            <tbody class="table-group-divider">
                @forelse($clientes as $fila)
                <tr>
                    <td>{{ $fila->idcliente }}</td>
                    <td>{{ $fila->nombre }}</td>
                    <td>{{ $fila->apellido }}</td>
                    <td>{{ $fila->numerodocumento }}</td>
                    <td class="text-center">
                        <a href="{{ route('admifunciones.edit', $fila->idcliente) }}"><button class="btn btn-warning">Editar</button></a>
                        <a href="{{ route('admifunciones.destroy', $fila->idcliente) }}" onclick="return confirm('¿Está seguro de desactivar el cliente?')">
                            <button class="btn btn-danger">Desactivar</button>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center"><h1>No existen los valores</h1></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
