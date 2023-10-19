@extends('../indexinicio')
@section('contenidobd')
    <div class="reporte">
        <form method="POST" action="{{ route('vehiculos.download-pdf') }}">
            @csrf
            <input type="hidden" name="numeroplaca" value="{{ $numeroplaca }}">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', session('reporteData.titulo')) }}">
            </div>
            <div>
                <label for="observaciones">Observaciones:</label>
                <textarea id="observaciones" name="observaciones" rows="4">{{ old('observaciones', session('reporteData.observaciones')) }}</textarea>
            </div>
            <div>
                <label for="firma">Firma:</label>
                <input type="text" id="firma" name="firma" value="{{ old('firma', session('reporteData.firma')) }}">
            </div>   
            <div>
                <label>Autor:</label>
                <input type="text" id="autor" name="autor" value="{{ old('autor', 'DANIEL ANDRES PINILLA') }}" readonly>
            </div>            
            <div>
                <label>Fecha Actual:</label>
                <span id="fecha">{{ session('reporteData.fechaActual') }}</span>
            </div>
            <button type="submit" class="btn btn-secondary" name="download">Generar reporte</button>

        </form>
        <button onclick="history.back()" class="btn btn-secondary">Volver</button>
    </div>
@endsection

