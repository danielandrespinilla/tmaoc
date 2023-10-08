<div class="reporte">
    <h1>Crear Reporte</h1>
    <form method="POST" action="{{ route('vehiculos.generar-reporte') }}">
        @csrf
        <input type="hidden" name="numeroplaca" value="{{ $numeroplaca }}">
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo">
        </div>
        <div>
            <label for="observaciones">Observaciones:</label>
            <textarea id="observaciones" name="observaciones" rows="4"></textarea>
        </div>
        <div>
            <label for="firma">Firma:</label>
            <input type="text" id="firma" name="firma">
        </div>
        <div>
            <label>Autor:</label>
            <span id="autor">DANIEL ANDRES PINILLA</span>
        </div>
        <div>
            <label>Fecha Actual:</label>
            <span id="fecha">{{ now()->format('Y-m-d') }}</span>
        </div>
        <a href="{{ $pdfLink }}" download="report.pdf" class="btn btn-primary">Generar Reporte</a>
    </form>
    <button onclick="history.back()" class="btn btn-secondary">Volver</button>
</div>
