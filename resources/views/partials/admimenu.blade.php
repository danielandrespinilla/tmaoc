<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página</title>
    <style>
        /* Estilo para el menú de navegación */
        nav {
            background-color: #333; /* Cambia este color a tu elección */
            color: #fff; /* Color del texto en el menú */
            padding: 10px 0; /* Espaciado interno superior e inferior */
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline;
            margin-right: 20px; /* Espaciado entre elementos del menú */
        }

        a {
            text-decoration: none;
            color: #fff; /* Color del texto en los enlaces */
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('admifunciones.index') }}">Clientes</a></li>
            <li><a href="{{ route('vehiculos.index') }}">Listado de  vehiculos</a></li>
            <li><a href="{{ route('ingresos.index') }}">Ingreso de los Clientes</a></li>
         
        </ul>
    </nav>

    <!-- Resto de tu contenido -->
</body>
</html>
