@extends('../indexinicio')
@section('contenidobd')
    <div>
        <form action="{{ route('admifunciones.update', $clientes->first()->idcliente) }}" method="POST">
            @csrf
            @forelse($clientes as $fila)
            <div>
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="" value="{{ $fila->nombre }}">
                <label for="">Apellido</label>
                <input type="text" name="apellido" id="" value="{{ $fila->apellido }}">
                <label for="">Numero documento</label>
                <input type="text" name="numerodocumento" id="" value="{{ $fila->numerodocumento }}">

                <!-- Campo para la ciudad -->
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" value="{{ $fila->ciudad_nombre }}">

                <!-- Campo para el departamento -->
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" value="{{ $fila->departamento_nombre }}">
            </div>
            @empty
            @endforelse
            <button>Enviar</button>
        </form>
    </div>
@endsection
