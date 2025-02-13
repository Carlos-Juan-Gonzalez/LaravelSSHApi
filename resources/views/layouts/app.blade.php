<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <!-- Aquí va el menú de navegación -->
    </nav>

    <div class="container">
        @yield('content')  <!-- Este es el lugar donde las vistas hijas se insertarán -->
    </div>

    <footer>
        <!-- Aquí va el pie de página -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

