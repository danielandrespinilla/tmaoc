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
                <div class="form-group">
                    <label for="depto">Departamento de residencia</label>
                    <select name="depto" id="depto" class="form-control">
                        <option value="">Seleccione un departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->iddepartamento }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad de residencia</label>
                    <select name="ciudad" id="ciudad" class="form-control">
                        <option value="">Seleccione una ciudad</option>
                        <!-- Las opciones de ciudades se cargarán dinámicamente mediante JavaScript -->
                    </select>
                </div>
            </div>
            @empty
            @endforelse
            <button>Enviar</button>
            <div>
                <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery -->
                <script src="{{ asset('js/ciudades.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                <script>
                    var buscarCiudadesRoute = '{{ route("buscarciudades", ":id") }}';
                </script>
            </div>
        </form>
    </div>
@endsection
