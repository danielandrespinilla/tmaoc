@extends('indexinicio')
@section('contenidobd')
<div class="container">
    <a href="{{route('ingresos.create')}}"><button class="btn btn-primary">Crear Fecha</button></a>
    <div class="table-responsive">
        <table class="table"> 
            <thead class="table-dark text-center">
                {{-- Primera fila --}}
                <tr>
                    <th>Codigo</th>
                    <th>Fecha ingreso </th>
                    <th>Fecha Salida</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            
            <tbody class="table-group-divider">
        
                {{-- Segunda fila --}}
                @forelse($ingresos as $fila)
                
                <tr>
                    <td>{{ $fila->idingreso }}</td>
                    <td>{{ $fila->fechahoraingreso }}</td>
                    <td>{{ $fila->fechahorasalida }}</td>
                    <td class="text-center">
                        <form action="{{route('ingresos.salida', $fila->idingreso)}}" method="POST">
                            
                            @csrf
                            <button class="btn btn-success">Fecha Saliada</button>
                        </form>
                        <a href="{{route('ingresos.edit', $fila->idingreso)}}"><button class="btn btn-info">Editar Fecha</button></a>
                        <a href="{{route('ingresos.destroy', $fila->idingreso)}}" onclick="return confirm('¿Esta seguro de eliminar las fechas de ingreso y salida ?')"><button class="btn btn-danger">Eliminar Fecha</button></a>
                       
                    </td>

                </tr>
                @empty
                <h1>No existen los valores</h1>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
@endsection