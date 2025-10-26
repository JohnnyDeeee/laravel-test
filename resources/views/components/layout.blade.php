<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'My Laravel App' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #1b1b18;
            margin: 0;
            padding: 20px;
        }
        header {
            margin-bottom: 20px;
            text-align: right;
        }
        nav a {
            text-decoration: none;
            color: #1b1b18;
            margin-left: 10px;
            padding: 5px 10px;
            border-radius: 4px;
            border: 1px solid transparent;
        }
        nav a:hover {
            border-color: #000000;
        }
        main {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <header>
        @if (Route::has('login'))
            <nav>
                <a href="{{ route('home') }}">Home</a>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('logout') }}">Logout</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                @endauth
            </nav>
        @endif
    </header>

    <main>
        {{ $slot }}
    </main>
</body>
</html>
