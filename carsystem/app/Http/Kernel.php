<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's HTTP middleware stack.
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class, // Handle proxy headers
        \Illuminate\Http\Middleware\HandleCors::class, // Handle Cross-Origin Resource Sharing
        \App\Http\Middleware\EncryptCookies::class, // Encrypt cookies
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Add queued cookies
        \Illuminate\Session\Middleware\StartSession::class, // Start session handling
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Validate post data size
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class, // Check for maintenance mode
        \Illuminate\Routing\Middleware\SubstituteBindings::class, // Substitute route bindings
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class, // Verify CSRF token for web routes
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api', // Apply API throttle settings
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class, // General authentication middleware
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, // HTTP basic authentication
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Redirect authenticated users
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Ensure email verification
        'admin' => \App\Http\Middleware\AdminMiddleware::class, // Custom admin middleware
        'role' => \App\Http\Middleware\CheckRole::class, // Custom role-check middleware
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Limit request rates
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class, // Validate signed URLs
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class, // Confirm password for sensitive routes
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class, // Bind route parameters to models
    ];
}
