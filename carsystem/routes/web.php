<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;

// Auth Routes
Auth::routes();
// Custom Login and Register Routes (Optional if you want customization)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Welcome Blade
Route::get('/', function () {
    return view('welcome');
})->name('home');

// User Views
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::post('/booking', [BookingController::class, 'store']);
Route::get('/feedbacks', [FeedbackController::class, 'index']);
Route::post('/feedbacks', [FeedbackController::class, 'store']);
Route::post('/payments', [PaymentController::class, 'store']);

// Admin login routes
Route::prefix('admin')->group(function () {
    // Public admin login/logout routes
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () { 
    // Home route for regular users
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Admin dashboard route
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // Resource routes with 'admin' prefix in names
        Route::resource('/cars', CarController::class, ['as' => '']);
        Route::resource('/users', UserController::class, ['as' => '']);
        Route::resource('/booking', BookingController::class, ['as' => '']);
    
        // Feedback routes
        Route::get('/feedbacks', [FeedbackController::class, 'adminIndex'])->name('feedbacks.index');
        Route::delete('/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
    });
});


// Static Pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Feedback and Booking Routes
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

// Home Route (Post Login Redirect)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// use App\Http\Controllers\Admin\AdminLoginController;
// use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Admin\CarController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\BookingController;
// use App\Http\Controllers\Admin\FeedbackController;

// Route::prefix('admin')->name('admin.')->group(function () {

//     // Public admin login/logout routes
//     Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
//     Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

//     // Admin protected routes
//     Route::middleware(['auth', 'admin'])->group(function () {
        
//         // Dashboard Route
//         Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
//         // Resource routes
//         Route::resource('/cars', CarController::class)->names([
//             'index' => 'cars.index',
//             'create' => 'cars.create',
//             'store' => 'cars.store',
//             'show' => 'cars.show',
//             'edit' => 'cars.edit',
//             'update' => 'cars.update',
//             'destroy' => 'cars.destroy',
//         ]);

//         Route::resource('/users', UserController::class)->names([
//             'index' => 'users.index',
//             'create' => 'users.create',
//             'store' => 'users.store',
//             'show' => 'users.show',
//             'edit' => 'users.edit',
//             'update' => 'users.update',
//             'destroy' => 'users.destroy',
//         ]);

//         Route::resource('/bookings', BookingController::class)->names([
//             'index' => 'bookings.index',
//             'create' => 'bookings.create',
//             'store' => 'bookings.store',
//             'show' => 'bookings.show',
//             'edit' => 'bookings.edit',
//             'update' => 'bookings.update',
//             'destroy' => 'bookings.destroy',
//         ]);

//         // Feedback routes
//         Route::get('/feedbacks', [FeedbackController::class, 'adminIndex'])->name('feedbacks.index');
//         Route::delete('/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
//     });
// });
