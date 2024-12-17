<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


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
            display: flex;
            align-items: center; /* Center form vertically */
            justify-content: center; /* Center form horizontally */
            padding: 20px; /* Optional: Add some spacing */
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
            <a class="navbar-brand" href="{{ route('home') }}">CarRentPro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedbacks.index') }}">Feedback</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookings.index') }}">Booking Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <span class="navbar-text">
                                Hello! {{ Auth::user()->name }}
                            </span>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <section class="content">
            @yield('content')
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} CARRENTALS. All rights reserved.</p>
    </footer>

    <!-- Dynamically Injected Scripts -->
    @yield('scripts')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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
        });

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
    </script>

</body>
</html>
