<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            
            <a href="/">Home</a>
            <a href="/cars">Cars</a>
            @auth
                <a href="/bookings">My Bookings</a>
                <a href="/logout">Logout</a>
            @else
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endauth
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Car Rental</p>
    </footer>
</body>
</html>
