<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;



use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminAuth;

// Admin Controllers
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFeedbackController;


// ----------------------------
// Authentication Routes
// ----------------------------
Auth::routes();

// User Login and Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ----------------------------
// General Routes
// ----------------------------
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ----------------------------
// User Routes (Authenticated User)
// ----------------------------

Route::middleware('auth')->group(function () {
    // Car Routes
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/cars/{id}/book', [CarController::class, 'showBookingForm'])->name('cars.book');

    // Booking Routes
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/create/{car}', [BookingController::class, 'showBookingForm'])->name('bookings.create');

    // Feedback Routes
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');

    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');


    // Payment Routes
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
});

// ----------------------------
// Admin Routes
// ----------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Authentication
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Admin Dashboard
    Route::middleware(AdminAuth::class)->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Admin Cars Management
        Route::resource('/cars', AdminCarController::class);

        // Admin User Management
        Route::resource('/users', UserController::class);

        // Admin Bookings Management
        Route::resource('/bookings', AdminBookingController::class);

        // Admin Feedbacks
        Route::get('/feedbacks', [FeedbackController::class, 'adminIndex'])->name('feedbacks.index');
        Route::delete('/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
        // Admin Feedback
    });
});

// ----------------------------
// Home Route
// ----------------------------
Route::get('/home', [CarController::class, 'showCarsOverview'])->name('home');