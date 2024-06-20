<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL FOR YOU - Fundación de Donaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #333;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #555;
        }
        .hero {
            background: url('https://via.placeholder.com/1200x400') no-repeat center center/cover;
            height: 400px;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .hero h1 {
            margin: 0;
            font-size: 3em;
            padding: 0.5em;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero p {
            margin: 0;
            font-size: 1.5em;
            background: rgba(0, 0, 0, 0.5);
            padding: 0.5em;
        }
        .content {
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
            position: relative;
            z-index: 1;
        }
        .content h2 {
            margin-top: 0;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>ALL FOR YOU</h1>
            <nav>
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/home') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
            @endif
                <a href="{{url('/vista-publicaciones')}}">Ver Publicaciones</a>
            </nav>
        </div>
    </header>

    <div class="hero">
        <h1>Bienvenidos a ALL FOR YOU</h1>
        <p>Ayudando a quienes más lo necesitan</p>
    </div>

    <div class="container">
        <div class="content">
            <h2>Nuestra Misión</h2>
            <p>ALL FOR YOU es una fundación dedicada a mejorar la calidad de vida de las personas más necesitadas. A través de nuestras iniciativas y programas, buscamos crear un impacto positivo en nuestras comunidades.</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 ALL FOR YOU. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
