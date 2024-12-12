<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Car Rental System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Car Rental System</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars.index') }}">Browse Cars</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to Car Rental System</h1>
            <p class="lead">Rent a car quickly and easily. Browse our collection and start your journey today!</p>
            <a href="{{ route('cars.index') }}" class="btn btn-light btn-lg">Get Started</a>
        </div>
    </header>

    <section class="container my-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <h3>Convenience</h3>
                <p>Book a car online from the comfort of your home.</p>
            </div>
            <div class="col-md-4 text-center">
                <h3>Wide Selection</h3>
                <p>Choose from a variety of cars to suit your needs.</p>
            </div>
            <div class="col-md-4 text-center">
                <h3>Affordable</h3>
                <p>Competitive pricing to fit your budget.</p>
            </div>
        </div>
    </section>

    <footer class="bg-light text-center py-3">
        <p>&copy; {{ date('Y') }} Car Rental System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
