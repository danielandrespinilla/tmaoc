@extends('../indexinicio')

@section('contenidobd')
<div>
    <form action="{{ route('admifunciones.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Crear Cliente</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('admifunciones.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="numerodocumento">Número de Documento</label>
                                    <input type="text" name="numerodocumento" id="numerodocumento" class="form-control" required>
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

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery -->
<script src="{{ asset('js/ciudades.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var buscarCiudadesRoute = '{{ route("buscarciudades", ":id") }}';
</script>
@endsection
