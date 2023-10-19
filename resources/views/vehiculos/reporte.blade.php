<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
</head>
<body>
    <h1>Reporte</h1>
    <p><strong>Número de Placa:</strong> {{ $numeroplaca }}</p>
    @if($titulo !== '')
        <p><strong>Título:</strong> {{ $titulo }}</p>
    @endif
    @if($observaciones !== '')
        <p><strong>Observaciones:</strong> {{ $observaciones }}</p>
    @endif
    @if($firma !== '')
        <p><strong>Firma:</strong> {{ $firma }}</p>
    @endif
    <p><strong>Autor:</strong> {{ $autor }}</p>
    <p><strong>Fecha Actual:</strong> {{ $fechaActual }}</p>
</body>
</html>
