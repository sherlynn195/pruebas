<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }
        /* Diseño de la barra superior */
        nav {
            background-color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        /* Estilo de los botones */
        .btn-outline {
            color: #ef4444;
            background-color: transparent;
            border: 2px solid #ef4444;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            background-color: #ef4444;
            color: white;
        }
        .btn-solid {
            background-color: #ef4444;
            color: white;
            border: 2px solid #ef4444;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-solid:hover {
            background-color: #dc2626;
            border-color: #dc2626;
        }
        /* Caja principal de contenido */
        .container {
            max-width: 800px;
            margin: 60px auto;
            background: white;
            padding: 50px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        h1 {
            color: #111827;
            margin-bottom: 15px;
        }
        p {
            color: #6b7280;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

    <!-- Menú de navegación condicional -->
    @if (Route::has('login'))
        <nav>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-solid">Ir al Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-outline">Iniciar sesión</a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-solid">Registrarse</a>
                @endif
            @endauth
        </nav>
    @endif

    <!-- Contenido principal -->
    <div class="container">
        <h1>Bienvenido a nuestra tienda</h1>
        <p>Aquí debe ir lo de los productos o una presentación de inicio.</p>
    </div>

</body>
</html>