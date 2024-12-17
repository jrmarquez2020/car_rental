<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Car Rental System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: #111;
            color: white;
        }
            body {
        min-height: 100%; /* Ensures the body takes at least 100% height of the viewport */
        height: 100%; /* Forces the body to fill 100% height */
        display: flex;
        flex-direction: column; /* Flexbox for content alignment */
        overflow-y: auto; /* Allows scrolling if content exceeds height */
        background-image: url('/storage/images/bg.png');
        background-size: cover; /* Ensures the background covers the area */
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
        }


        .content {
            flex: 1; /* Ensures the content area expands dynamically */
            display: flex;
            align-items: center; /* Center form vertically */
            justify-content: center; /* Center form horizontally */
            padding: 20px; /* Optional: Add some spacing */
        }

        /* Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            color: #FF7200 !important;
            font-size: 40px;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #FFA64D !important;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
        }

        .nav-link:hover {
            color: #FFA64D;
        }

        /* Main Content Area */
        .content {
            flex: 1; /* This makes the content area grow to take up space */
        }

        .form-container {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            border-radius: 10px;
            padding: 30px;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
        }

        .form-container h1, .form-container h2 {
            color: white;
        }

        .btn-custom {
            background-color: #FF7200;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #e06600;
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.6);
            padding: 10px 0;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">CarRentPro</a>
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

    <!-- Main Content -->
    <section class="content">
        <div class="form-container">
            @yield('content')
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} CARRENTALS. All rights reserved.</p>
    </footer>
    <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordConfirm = document.getElementById('password_confirmation');
    const eyeConfirmIcon = document.getElementById('eyeConfirmIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle the password visibility
        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        }
        toggleConfirmPassword.addEventListener('click', function () {
        // Toggle the confirm password visibility
        if (passwordConfirm.type === 'password') {
            passwordConfirm.type = 'text';
            eyeConfirmIcon.classList.remove('bi-eye-slash');
            eyeConfirmIcon.classList.add('bi-eye');
        } else {
            passwordConfirm.type = 'password';
            eyeConfirmIcon.classList.remove('bi-eye');
            eyeConfirmIcon.classList.add('bi-eye-slash');
        }
    });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
