@extends('indexinicio')
@section('contenidobd')
<div class="container">
    <a href="{{route('admifunciones.create')}}"><button class="btn btn-success">Crear</button></a>
    <div class="table-responsive">
        <table class="table"> 
                <thead class="table-dark text-center">
                {{-- Primera fila --}}
                <tr>
                    <td>Codigo</td>
                    <td>Nombre</td>
                    <td>Acciones</td>
                </tr>
                </thead>
        
            <tbody class="table-group-divider">
                {{-- Segunda fila --}}
                @forelse($clientes as $fila)
                <tr>
                    <td>{{ $fila->idcliente }}</td>
                    <td>{{ $fila->nombre }}</td>
                    <td>{{ $fila->apellido }}</td>
                    <td>{{ $fila->numerodocumento }}</td>
                    <td class="text-center">
                        <a href="{{route('admifunciones.edit', $fila->idcliente)}}"><button class="btn btn-warning"">Editar</button></a>
                        <a href="{{ route('admifunciones.update', $fila->idcliente) }}" onclick="return confirm('¿Está seguro de desactivar el cliente?')">
                            <button class=" btn btn-danger">Desactivar</button>
                        </a>
                        
                    </td>
                    
                </tr>
                @empty
                <h1>No existen los valores</h1>
                @endforelse
            </tbody>
        <table >
    </div>
@endsection