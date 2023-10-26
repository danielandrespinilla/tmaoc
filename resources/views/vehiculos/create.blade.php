@extends('../indexinicio')
@section('contenidobd')

<form method="POST" action="{{ route('vehiculos.store') }}">
    @csrf
    <div class="form-group">
        <label for="numeroplaca">Número de Placa</label>
        <input type="text" name="numeroplaca" class="form-control">
    </div>
    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" class="form-control">
    </div>
    <div class="form-group">
        <label for="nombre_marca">Nombre de la Marca</label>
        <input type="text" name="nombre_marca" class="form-control">
    </div>
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

    <button type="submit" class="btn btn-primary">Guardar</button>
   <div>
        <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery -->
        <script src="{{ asset('js/ciudades.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            var buscarCiudadesRoute = '{{ route("buscarciudades", ":id") }}';
        </script>
    </div>
</form>
@endsection

