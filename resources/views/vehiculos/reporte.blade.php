<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
</head>
<body>
    <h1>Reporte</h1>
    <p><strong>Número de Placa:</strong> {{ $numeroplaca }}</p>
    @if(isset($titulo))
        <p><strong>Título:</strong> {{ $titulo }}</p>
    @endif
    @if(isset($observaciones))
        <p><strong>Observaciones:</strong> {{ $observaciones }}</p>
    @endif
    @if(isset($firma))
        <p><strong>Firma:</strong> {{ $firma }}</p>
    @endif
    @if(isset($fechaActual))
        <p><strong>Fecha Actual:</strong> {{ $fechaActual }}</p>
    @endif
</body>
</html>
