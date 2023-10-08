<!DOCTYPE html>
<html>
<head>
    <title>Crear Reporte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .reporte {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="reporte">
        <h1>Crear Reporte</h1>
        <form method="POST" action="{{ route('vehiculos.generar-reporte') }}">
            @csrf
            <div>
                <label for="numeroplaca">Número de Placa:</label>
                <input type="text" id="numeroplaca" name="numeroplaca" value="{{ $numeroplaca }}" readonly>
            </div>
            
           
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
            <button type="submit">Generar Reporte</button>
        </form>
        @if(isset($pdfLink))
        <p>Reporte generado: <a href="{{ $pdfLink }}">Descargar Reporte</a></p>
        @endif
    
    </div>
</body>
</html>
