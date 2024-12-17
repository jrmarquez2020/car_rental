<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome to Car Rental System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden;
        }

        body {
            background-image: url('/storage/images/bg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            color: white;
            text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .navbar {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand, .nav-link {
            color: white !important;
            text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
            font-weight: bold;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80%;
            text-align: center;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
        }

        .btn-light {
            background: rgba(255, 255, 255, 0.8);
            color: black;
        }

        .navbar-brand {
            color: #FF7200 !important;
            font-size: 40px;
            font-weight: bold;
            text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .navbar-brand:hover {
            color: #FFA64D !important;
        }

        header {
            background-image: url('/storage/images/bg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
        }

        header .container {
            max-width: 600px;
            text-align: left;
            padding: 60px 20px;
        }

        header h1 {
            font-size: 4rem;
            font-weight: bold;
            color: #FFA500;
        }

        header h2 {
            font-size: 3rem;
            color: white;
        }

        header p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        header .btn {
            margin-top: 20px;
        }

        .btn-custom {
            background-color: #FF7200;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #e06600;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">CarRentPro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars.index') }}">Browse Cars</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="container">
            <h2>@yield('header-title', 'Rent Your')</h2>
            <h1>@yield('header-subtitle', 'Dream Car')</h1>
            <p class="lead">
                @yield('header-description', 'Live the life of Luxury. Just rent a car of your wish from our vast collection. Enjoy every moment with your family. Join us to make this family vast.')
            </p>
            @yield('header-button')
        </div>
    </header>

    <section class="container my-5 text-center">
        @yield('content')
    </section>

    <footer class="text-center py-3">
        <p>&copy; {{ date('Y') }} CARRENTALS. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
